<?php

namespace App\Models;

use OwenIt\Auditing\Models\Audit;

class AuditLog extends Audit
{
    use exportTrait;

    //欄位名稱
    public array $Column_Title_Text = [
        "id" => "編號",
        "user_type" => "操作對應表",
        "user_id" => "操作人",
        "event" => "事件",
        "auditable_type" => "審計對應表",
        "auditable_id" => "審計表編號",
        "old_values" => "事件操作前",
        "new_values" => "事件操作後",
        "url" => "造訪網址",
        "ip_address" => "IP位址",
        "user_agent" => "瀏覽器紀錄",
        "tags" => "標籤",
        "created_at" => "建立時間",
    ];

    public function scopeFilter($query,Array $Data)
    {
        //過濾選項
//        if ( isset($Data["filter_status"]) ) {
//            $query->whereIn('status',(array)$Data["filter_status"]);
//        }
//        //過濾文字條件
        if ( isset($Data["filter_text_key"]) ) {
            $query->where($Data["filter_text_key"],'like', '%'.$Data["filter_text_value"].'%');
        }
        //排序
        if ( isset($Data["order_by"]) ) {
            $order_by = explode(",", $Data["order_by"]);
            $query->orderBy($order_by[0], $order_by[1]);
        }
        //
        return $query;
    }


}
