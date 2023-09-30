<?php

namespace App\Services\Route;

/**
 * 頁面標題
 * 操作紀錄LOG顯示
*/

class RouteTitle
{
    public array $NameToTitle = [
        //
        "user_list" => "管理人列表",
        "user_update_html" => "管理人修改",
        "user_update" => "管理人修改提交",
        "user_del" => "管理人刪除提交",
        "user_export" => "管理人匯出",
        "user_import" => "管理人匯入",
        "user_audit" => "管理人操作紀錄",
        //
        "audit_list" => "操作紀錄列表",
        "audit_update_html" => "操作紀錄修改",
        "audit_update" => "操作紀錄修改提交",
        "audit_del" => "操作紀錄刪除提交",
        "audit_export" => "操作紀錄匯出",
        "audit_import" => "操作紀錄匯入",
        "audit_reverse" => "操作紀錄操作紀錄",
        //
        "system_update_html"=>"",
        "system_update"=>"",
        "system_delete_image"=>"",
        //
        "http_log"=>"",
        "http_log_update"=>"",
    ];

    public function getTitle($routeName){
        return $this->NameToTitle[$routeName]??$routeName;
    }
}