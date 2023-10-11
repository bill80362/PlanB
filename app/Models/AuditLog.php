<?php

namespace App\Models;

use OwenIt\Auditing\Models\Audit;

class AuditLog extends Audit
{
    use ExportImportTrait;

    //欄位名稱
    public array $Column_Title_Text = [
        'id' => '編號',
        'user_type' => '操作對應表',
        'user_id' => '操作人',
        'event' => '事件',
        'auditable_type' => '操作表',
        'auditable_id' => '操作編號',
        'old_values' => '操作前',
        'new_values' => '操作後',
        'url' => '網址',
        'ip_address' => 'IP',
        'user_agent' => '瀏覽器',
        'tags' => '標籤',
        'version' => '版本',
        'created_at' => '建立時間',
        'route_name' => '路由名稱',
    ];
    //
    public array $eventText = [
        "created" => "新增",
        "updated" => "修改",
        "deleted" => "刪除",
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
        "event" => "select2",
    ];
    //自定義篩選條件
    public function useFilterExtend($query, array $Data)
    {
        return $query;
    }
    public $filterTextKey = [
        'old_values', 'new_values', 'event', 'version'
    ];
    public $filterTextKeyCustom = [];
    public function useCustomTextSearch($query, array $Data)
    {
        return $query;
    }
}
