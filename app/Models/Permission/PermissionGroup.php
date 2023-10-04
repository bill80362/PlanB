<?php

namespace App\Models\Permission;

use App\Models\FilterTemplateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\ExportImportTrait;
use OwenIt\Auditing\Contracts\Auditable;

class PermissionGroup extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable; //操作Log
    use ExportImportTrait; //匯出

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
        'name' => '名稱',
        'status' => '狀態',
    ];

    /**
     * model的key-value對轉，考慮excel匯入匯出可以使用
     */
    public array $statusText = [
        'Y' => '正常',
        'N' => '鎖定',
    ];

    public function permissionGrouopItems()
    {
        return $this->hasMany(PermissionGroupItem::class);
    }

    /**
     * 後台操作測定
     */
    public function getValidatorRules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function getValidatorMessage()
    {
        return [];
    }
    //
    // public function scopeFilter($query, array $Data)
    // {
    //     //過濾選項
    //     if (isset($Data['filter_status'])) {
    //         $query->whereIn('status', (array) $Data['filter_status']);
    //     }
    //     //過濾文字條件
    //     if (isset($Data['filter_text_key'])) {
    //         $query->where($Data['filter_text_key'], 'like', '%' . $Data['filter_text_value'] . '%');
    //     }
    //     //排序
    //     if (isset($Data['order_by'])) {
    //         $order_by = explode(',', $Data['order_by']);
    //         $query->orderBy($order_by[0], $order_by[1]);
    //     }
    //     //
    //     return $query;
    // }

    //判斷匯入的時候，新增或是更新
    public function scopeImportPrimary($query, array $UpdateData)
    {
        if (isset($UpdateData['id'])) {
            $query->where('id', $UpdateData['id']);
        } else {
            $query->where('id', 0);
        }
        //
        return $query;
    }

    /**
     * 後台操作 列表 匯出 篩選器
     * template 對應的地方:
     * 1.版面，修改位置 class OperateFilterDiv，主要負責讓使用者選擇篩選條件
     * 2.功能，修改位置 model，主要負責SQL篩選條件
     * 3.篩選器移除標籤，修改位置 chosen ，主要可以快速移除篩選條件
     */
    use FilterTemplateTrait;
    public array $filterTemplate = [
        "status" => "radio",
        "updated_at" => "rangeDateTime",
        "id" => "selectAndInput"
    ];
    //自定義篩選條件
    public function useFilterExtend($query, array $Data)
    {
        return $query;
    }


    public $filterTextKey = [
        'name', 'id'
    ];
    public $filterTextKeyCustom = [];

    public function useCustomTextSearch($query, array $Data)
    {
        return $query;
    }
}
