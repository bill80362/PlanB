<?php

namespace App\Services\Operate;

use App\Models\AuditLog;
use App\Models\FileUpload;
use App\Models\Permission\PermissionGroup;
use App\Models\User;
use App\Models\User\ListColumnSetting;
use App\Models\CountryAndShippingFee\Language;
use Illuminate\Database\Eloquent\Model;

class ListColumnService
{
    private array $columnStyle = [
        Language::class => [
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
        User::class => [
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
        AuditLog::class => [
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
        Language::class => [
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
        PermissionGroup::class => [
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
