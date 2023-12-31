<?php

namespace App\Models\CountryAndShippingFee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExportImportTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\FilterTemplateTrait;

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

    use FilterTemplateTrait;
    public array $filterTemplate = [
        "is_change" => [
            "template" => "radio",
            "customQuery" => true,
            'title' => 'isUpdated'
        ],
        // "text" => ''
        // "test" => [
        //     "type" => "selectAndInput",
        //     "customQuery" => true,
        //     'title' => 'test'
        // ]
    ];

    public function useFilterExtend($query, array $Data)
    {

        // 匯出時要全部語系都匯出，但搜尋時只搜尋出一種語系
        if (!array_key_exists('type', $Data)) {
            $defaultLang = config('app.locale', 'zh-tw');
            $query->where('lang_type', $defaultLang);
        }

        //過濾選項
        if (isset($Data['filter_is_change'])) {
            $isChanges = array_filter((array)$Data['filter_is_change']);
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

        return $query;
    }


    /**
     * 資料表欄位文字搜尋
     */
    public $filterTextKey = [
        'text',
        'tran_text'
    ];


    /**
     * 客制文字搜尋
     */
    public $filterTextKeyCustom = [
        'lang_url_map' => '相關網址'
    ];

    public function useCustomTextSearch($query, array $Data)
    {
        if (isset($Data['filter_text_key']) && in_array($Data['filter_text_key'], array_keys($this->filterTextKeyCustom))) {
            $query->whereHas('langUrlMaps', function ($subQuery) use ($Data) {
                return $subQuery->where('url', 'like', '%' . $Data['filter_text_value'] . '%');
            });
        }

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
