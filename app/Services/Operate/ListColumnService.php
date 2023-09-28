<?php

namespace App\Services\Operate;

use App\Models\User;
use App\Models\User\ListColumnSetting;
use App\Models\CountryAndShippingFee\Language;
use Illuminate\Database\Eloquent\Model;

class ListColumnService
{


    private $defines = [
        User::class => [
            "allColumn" => [
                'id', 'name', 'email', 'status'
            ],
            "lockColumn" => [
                'id', 'email'
            ],
        ],


        Language::class => [
            "allColumn" => [
                'default_serial_number',
                'text', 'tran_text', 'lang_type', 'isUpdated', 'updated_at', 'created_at',
                'default_action'
            ],
            "lockColumn" => [
                'default_serial_number', 'default_action'
            ],
        ],
    ];


    public function getTableSetting(Model $model)
    {
        foreach ($this->defines as $key => $values) {
            if ($model instanceof $key) {
                return $values;
            }
        }

        return false;
    }


    public function getWithUserId(Model $model, $userId)
    {
        $datas = ListColumnSetting::where('user_id', $userId)
            ->where("list_model_type", $model::class)->orderBy('sort', 'desc')
            ->get()->map(function ($item) {
                return $item['column_name'];
            })->toArray();
        $setting = $this->getTableSetting($model);

        if (count($datas) == 0) return $setting['allColumn'];
        else {
            $checkColumn = collect($datas)->intersect($setting['allColumn'])->toArray();
            return array_merge($checkColumn, $setting['lockColumn']);
        }
    }

    /**
     * 
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
