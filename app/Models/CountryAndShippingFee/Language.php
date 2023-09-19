<?php

namespace App\Models\CountryAndShippingFee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $keyType = 'int';
    protected $guarded = [];

    //事件偵測 retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored
    protected $dispatchesEvents = [
        // 'saving' => '',
        // 'created' => '',
        // 'updated' => '',
    ];

    public array $Column_Title_Text = [
        "id" => "編號",
        "status" => "狀態",
        "type" => "類型",
        "lang_type" => "語系",
        "text" => "名稱",
        "tran_text" => "翻譯後名稱",
        "memo" => "備註",
    ];

    public array $statusText = [
        "Y" => "啟用",
        "N" => "停用",
    ];

    public array $typeText = [
        "1" => "前台",
        "2" => "系統",
        "3" => "JS程式語系",
        "4" => "PHP程式語系",
        "5" => "共用",
        "6" => "郵件語系",
    ];

    public array $langTypeText = [
        "1" => "繁體中文",
        "2" => "簡體中文",
        "3" => "英文",
    ];

    public array $langFileMap = [
        "1" => "zh-tw.json",
        "2" => "zh-cn.json",
        "3" => "en.json",
    ];

    public function getValidatorRules()
    {
        return [
            "status" => ['required'],
            "type" => ['required'],
            "lang_type" => ['required'],
            "text" => ['required'],
            "tran_text" => ['required'],
            "memo" => [''],
        ];
    }
    public function getValidatorMessage()
    {
        return [];
    }


    public function scopeFilter($query, array $Data)
    {
        //過濾選項
        if (isset($Data["filter_status"])) {
            $query->whereIn('status', (array)$Data["filter_status"]);
        }

        if (isset($Data["filter_type"])) {
            $query->whereIn('type', (array)$Data["filter_type"]);
        }

        if (isset($Data["filter_lang_type"])) {
            $query->whereIn('lang_type', (array)$Data["filter_lang_type"]);
        }
        //過濾文字條件
        if (isset($Data["filter_text_key"])) {
            $query->where($Data["filter_text_key"], 'like', '%' . $Data["filter_text_value"] . '%');
        }
        //排序
        if (isset($Data["order_by"])) {
            $order_by = explode(",", $Data["order_by"]);
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
                $Temp[] = $model->$key ?? "";
            }
            $ExportList[] = $Temp;
        }
        //
        return $ExportList;
    }
}