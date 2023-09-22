<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HttpLog extends Model
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
        'id' => '編號',
        'type' => '分類',
        'primary_key' => '主鍵',
        'status' => '狀態',
        'status_code' => 'http code',
        'connect_time' => '串接時間',
        'proccess_time' => '',
        'url' => '網址',
        'method' => '方法',
        'request' => 'Request',
        'response' => 'Response',
        'created_at' => '建立時間',
    ];

    public function scopeFilter($query, array $Data)
    {
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
