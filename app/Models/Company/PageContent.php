<?php

namespace App\Models\Company;

use App\Models\ExportImportTrait;
use App\Models\FilterTemplateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PageContent extends Model implements Auditable
{
    use HasFactory;
    use ExportImportTrait; //匯出    
    use \OwenIt\Auditing\Auditable; //操作Log

    public $incrementing = true;
    protected $keyType = 'int';
    protected $guarded = [];


    public function getValidatorRules()
    {
        return [
            // 'lang_type' => ['required'],
            // 'text' => ['required'],
            // 'tran_text' => ['required'],
            // 'memo' => [''],
        ];
    }

    public function getValidatorRulesForUpdate()
    {
        return [
            // 'tran_text' => ['required'],
            // 'memo' => [''],
            // 'else_langTypes.*' => ['array'],
            // 'else_trans.*' => ['array', 'string'],
        ];
    }

    public function getValidatorMessage()
    {
        return [];
    }

    /**
     * 資料表欄位名稱對應，非實體欄位，不能設定
     */
    public array $Column_Title_Text = [
        'lang_type' => '語系',
        'page_name' => '頁面名稱',
        'slug' => '網址路徑',
        'created_at' => '建置時間',
        'updated_at' => '更新時間'
    ];

    /**
     * 匯入匯出的欄位，
     * 1.請注意匯入也會考慮必填欄位，沒有會擋下。
     * 2.要有PrimaryKey
     */
    public array $Batch_Title_Text = [
        'id' => '編號',

    ];

    /**
     * 後台操作 列表 匯出 篩選器
     * template 對應的地方:
     * 1.版面，修改位置 class OperateFilterDiv，主要負責讓使用者選擇篩選條件
     * 2.功能，修改位置 model，主要負責SQL篩選條件
     * 3.篩選器移除標籤，修改位置 chosen ，主要可以快速移除篩選條件
     */
    use FilterTemplateTrait;
    public array $filterTemplate = [
        // "status" => "radio",
        // "updated_at" => "rangeDateTime",
        // "id" => "selectAndInput"
    ];
    //自定義篩選條件
    public function useFilterExtend($query, array $Data)
    {
        // 匯出時要全部語系都匯出，但搜尋時只搜尋出一種語系
        if (!array_key_exists('type', $Data)) {
            $query->where('lang_type', 'zh-tw');
        }

        return $query;
    }


    public $filterTextKey = [
        'page_name'
    ];
    public $filterTextKeyCustom = [
        // 'lang_url_map' => '相關網址'
    ];

    public function useCustomTextSearch($query, array $Data)
    {
        // if (isset($Data['filter_text_key']) && in_array($Data['filter_text_key'], array_keys($this->filterTextKeyCustom))) {
        //     $query->whereHas('langUrlMaps', function ($subQuery) use ($Data) {
        //         return $subQuery->where('url', 'like', '%' . $Data['filter_text_value'] . '%');
        //     });
        // }

        return $query;
    }
}
