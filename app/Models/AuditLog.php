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
        'audit_title' => '操作標題',
        'route_name' => '路由名稱',
    ];
    //
    public array $eventText = [
        "created" => "新增",
        "updated" => "修改",
        "deleted" => "刪除",
    ];

    public function scopeFilter($query, array $Data)
    {
        //過濾選項
        if ( isset($Data["filter_event"]) ) {
            $query->whereIn('event',(array)$Data["filter_event"]);
        }
        //過濾文字條件
        if (isset($Data['filter_text_key'])) {
            $query->where($Data['filter_text_key'], 'like', '%'.$Data['filter_text_value'].'%');
        }
        //排序
        if (isset($Data['order_by'])) {
            $order_by = explode(',', $Data['order_by']);
            $query->orderBy($order_by[0], $order_by[1]);
        }

        //
        return $query;
    }
}
