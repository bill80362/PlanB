<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\ExportImportTrait;

class PermissionGroup extends Model
{
    use HasFactory;
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
        'show_flag' => '狀態',
    ];

    /**
     * model的key-value對轉，考慮excel匯入匯出可以使用
     */
    public array $showFlagText = [
        'Y' => '正常',
        'N' => '鎖定',
    ];
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->showFlagText[$value] ?? $value,
            set: fn (string $value) => array_flip($this->showFlagText)[$value] ?? $value,
        );
    }

    protected $with = ['permissionGrouopItems'];
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
    public function scopeFilter($query, array $Data)
    {
        //過濾選項
        if (isset($Data['filter_show_flag'])) {
            $query->whereIn('show_flag', (array) $Data['filter_show_flag']);
        }
        //過濾文字條件
        if (isset($Data['filter_text_key'])) {
            $query->where($Data['filter_text_key'], 'like', '%' . $Data['filter_text_value'] . '%');
        }
        //排序
        if (isset($Data['order_by'])) {
            $order_by = explode(',', $Data['order_by']);
            $query->orderBy($order_by[0], $order_by[1]);
        }
        //
        return $query;
    }

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
}
