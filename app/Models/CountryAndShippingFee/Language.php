<?php

namespace App\Models\CountryAndShippingFee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    
    public $incrementing = true;
    protected $keyType = 'int';
    // protected $table = 'table name';
    protected $guarded = [];

    //事件偵測 retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, restoring, restored
    protected $dispatchesEvents = [
        // 'saving' => '',
        // 'created' => '',
        // 'updated' => '',
    ];

    public array $Column_Title_Text = [
        "id" => "編號",
        "status" => "校正狀態",
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

}
