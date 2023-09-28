<?php

namespace App\Models\CountryAndShippingFee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExportImportTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Language extends Model
{
    use HasFactory;
    use ExportImportTrait; //匯出

    public $incrementing = true;

    protected $keyType = 'int';

    protected $guarded = [];

    //事件偵測 retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored
    protected $dispatchesEvents = [
        // 'saving' => '',
        // 'created' => '',
        // 'updated' => '',
    ];

    /**
     * 資料表關聯設定
     */
    public function langUrlMaps()
    {
        return $this->hasMany(LangUrlMap::class, 'language_key', 'text');
    }

    public array $Column_Title_Text = [
        'id' => '編號',
        'lang_type' => '語系',
        'text' => '名稱',
        'tran_text' => '翻譯後名稱',
        'memo' => '備註',
        'created_at' => '建置日期',
        'updated_at' => '修改時間',
    ];

    public function getOtherLangs()
    {
        $newDict = [];
        foreach ($this->langTypeText as $key => $value) {
            if ($this->lang_type == $key) {
                continue;
            }
            $newDict[$key] = $value;
        }

        return $newDict;
    }

    public array $langTypeText = [
        'zh-tw' => '繁體中文',
        'zh-cn' => '簡體中文',
        'en' => '英文',
        // "jp" => "日文",
    ];

    public array $isChangeText = [
        'Y' => '是',
        'N' => '否',
    ];

    public function getCode()
    {
        return array_keys($this->langTypeText);
    }

    protected function isUpdated(): Attribute
    {
        return Attribute::make(
            get: fn () => $this['updated_at']->equalTo($this['created_at']),
        );
    }

    public function getValidatorRules()
    {
        return [
            'lang_type' => ['required'],
            'text' => ['required'],
            'tran_text' => ['required'],
            'memo' => [''],
        ];
    }

    public function getValidatorRulesForUpdate()
    {
        return [
            'tran_text' => ['required'],
            'memo' => [''],
            'else_langTypes.*' => ['array'],
            'else_trans.*' => ['array', 'string'],
        ];
    }

    public function getValidatorMessage()
    {
        return [];
    }

    public function scopeFilter($query, array $Data)
    {
        //過濾選項
        // if (isset($Data['filter_lang_type'])) {
        //     $query->whereIn('lang_type', (array) $Data['filter_lang_type']);
        // }

        $query->where('lang_type', 'zh-tw');

        if (isset($Data['filter_is_change'])) {
            $isChanges = (array)$Data['filter_is_change'];
            $query->where(function ($subQuery) use ($isChanges) {
                foreach ($isChanges as $isChange) {
                    if ($isChange == 'Y') {
                        $subQuery->orWhereColumn('updated_at', '!=', 'created_at');
                    } else {
                        $subQuery->orWhereColumn('updated_at',  'created_at');
                    }
                }
            });
        }

        //過濾文字條件
        if (isset($Data['filter_text_key'])) {
            if ($Data['filter_text_key'] == 'lang_url_map') {
                $query->whereHas('langUrlMaps', function ($subQuery) use ($Data) {
                    $subQuery->where('url', 'like', '%' . $Data['filter_text_value'] . '%');
                });
            } else {
                $query->where($Data['filter_text_key'], 'like', '%' . $Data['filter_text_value'] . '%');
            }
        }
        //排序
        if (isset($Data['order_by'])) {
            $order_by = explode(',', $Data['order_by']);
            $query->orderBy($order_by[0], $order_by[1]);
        }

        //
        return $query;
    }

    public function scopeExport($query)
    {
        //整理匯出資料
        $ExportList = [];
        //要匯出的欄位
        $Column_Title_Text = $this->Column_Title_Text;
        //放入標題
        $ExportList[] = array_values($Column_Title_Text);
        //要匯出的資料
        foreach ($query->get() as $model) {
            $Temp = [];
            foreach ($Column_Title_Text as $key => $value) {
                //放入標題對應的資料
                $Temp[] = $model->$key ?? '';
            }
            $ExportList[] = $Temp;
        }

        //
        return $ExportList;
    }


    //判斷匯入的時候，新增或是更新
    public function scopeImportPrimary($query, array $UpdateData)
    {
        if (isset($UpdateData['id'])) {
            $query->where('id', $UpdateData['id']);
        } else {
            $query->where('id', 0);
        }

        //
        return $query;
    }
}
