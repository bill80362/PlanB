<?php

namespace App\Services\Operate;

use App\Models;
use App\Models\User\ListColumnSetting;
use Illuminate\Database\Eloquent\Model;

class ListColumnService
{
    private array $columnStyle = [
        Models\CountryAndShippingFee\Language::class => [
            "updated_at" => [
                "width: 140px",
            ],
            "created_at" => [
                "width: 140px",
            ]
        ],
    ];

    //請注意順序 lockColumn > canUseColumn > lockColumnTail
    private array $defines = [
        Models\User::class => [
            "lockColumn" => [
                'default_serial_number',
            ],
            "canUseColumn" => [
                'id', 'email', 'name', 'status', 'updated_at', 'updated_by',
            ],
            "lockColumnTail" => [
                'operate'
            ],
        ],
        Models\AuditLog::class => [
            "lockColumn" => [
                'default_serial_number', 'audit_title',
            ],
            "canUseColumn" => [
                'user_type', 'user_id', 'event', 'auditable_type', 'auditable_id', 'old_values', 'new_values',
                'url', 'ip_address', 'user_agent', 'version', 'route_name', 'created_at',
            ],
            "lockColumnTail" => [
                'operate'
            ],
        ],
        Models\CountryAndShippingFee\Language::class => [
            "lockColumn" => [
                'lang_type', 'default_serial_number'
            ],
            "canUseColumn" => [
                'text', 'tran_text', 'isUpdated', 'updated_at', 'created_at'
            ],
            "lockColumnTail" => [
                "operate"
            ],
        ],
        Models\Permission\PermissionGroup::class => [
            "lockColumn" => [
                'default_serial_number',
            ],
            "canUseColumn" => [
                'id', 'name', 'status',
            ],
            "lockColumnTail" => [
                'operate'
            ],
        ],
        Models\Log\HttpLog::class => [
            "lockColumn" => [
                'default_serial_number',
            ],
            "canUseColumn" => [
                'id', 'type', 'primary_key', 'status', 'status_code', 'connect_time', 'process_time', 'url', 'method', 'request', 'response', 'created_at',
            ],
            "lockColumnTail" => [
                'operate'
            ],
        ],
        Models\Company\PageContent::class => [
            "lockColumn" => [
                'default_serial_number',
            ],
            "canUseColumn" => [
                'lang_type', 'page_name', 'slug', 'created_at', 'updated_at'
            ],
            "lockColumnTail" => [
                'operate'
            ],
        ],


        // 請勿刪除此行註解，stub產生放置位置
    ];

    //抓取設定檔，會抓取parent class的設定檔
    public function getTableSetting(Model $model)
    {
        foreach ($this->defines as $key => $values) {
            if ($model instanceof $key) {
                $columnStyle = array_key_exists($model::class, $this->columnStyle) ? $this->columnStyle[$model::class] : [];

                return array_merge($values, [
                    'columnStyle' => $columnStyle
                ]);
            }
        }
        return false;
    }
    //可以不用
    public function parseSetting(Model $model, $input = [])
    {
        $tableSetting = $this->getTableSetting($model);

        $lockTitles = collect($input)->only($tableSetting['lockColumn']);
        $titles = collect($input)->only($tableSetting['canUseColumn']);

        return [$lockTitles, $titles];
    }


    public function getWithUserId(Model $model, $userId)
    {
        //固定設定
        $setting = $this->getTableSetting($model);
        //使用者的設定
        $datas = ListColumnSetting::where('user_id', $userId)
            ->where("list_model_type", $model::class)->orderBy('sort', 'desc')
            ->get()->map(function ($item) {
                return $item['column_name'];
            })->toArray();
        //如果沒資料就全部欄位顯示
        if (count($datas) == 0) {
            $datas = $setting['canUseColumn'];
        }
        $checkColumn = collect($datas)->intersect($setting['canUseColumn'])->toArray();
        return array_merge($setting['lockColumn'], $checkColumn, $setting['lockColumnTail']);
    }

    /**
     * 儲存使用者設定檔
     */
    public function renewListColumn(Model $model, $list = [], $userId)
    {
        ListColumnSetting::where('list_model_type', $model::class)
            ->where('user_id', $userId)->delete();
        $list = array_reverse($list);
        foreach ($list as $key => $item) {
            ListColumnSetting::create([
                'list_model_type' => $model::class,
                'user_id' => $userId,
                'column_name' => $item,
                'sort' => $key
            ]);
        }
    }
}
