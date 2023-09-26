<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Permission\Permission;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    //操作紀錄
    use HasApiTokens, HasFactory, Notifiable;
    use \OwenIt\Auditing\Auditable; //操作Log
    use ExportImportTrait; //匯出

    /**
     * 欄位新增修改的黑名單，注意 create()會吃到，save（）不會吃到
     * 如果create()想要先關閉guarded，可以使用  Model::unguard(); ，通常用於seed的時候
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    /**
     * 欄位不顯示，通常用於密碼
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //更新密碼 新密碼
    public String $newPassword = '';



    /**
     * Audit外掛 標記Tag 多筆資料逗號分隔
     */
    public function generateTags(): array
    {
        return [
            //            $this->id,
            //            $this->name,
        ];
    }
    /**
     * 資料表關聯設定
     */
    protected $with = ['permissions'];
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    /**
     * 資料表欄位名稱對應
     */
    public array $Column_Title_Text = [
        'id' => '編號',
        'name' => '姓名',
        'email' => 'Email',
        'password' => '密碼',
        'status' => '狀態',
    ];
    /**
     * 匯入匯出的欄位，
     * 1.請注意匯入也會考慮必填欄位，沒有會擋下。
     * 2.要有PrimaryKey
     */
    public array $Batch_Title_Text = [
        'id' => '編號',
        'name' => '姓名',
        'email' => 'Email',
        'password' => '密碼',
        'status' => '狀態',
    ];

    /**
     * 欄位強制轉型
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * model的key-value對轉，考慮excel匯入匯出可以使用
     */
    public bool $useMutator = true;//是否使用資料變異器
    public array $statusText = [
        'Y' => '啟用',
        'N' => '停用',
    ];
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->useMutator ? (isset($this->statusText[$value]) ? __($this->statusText[$value]) : $value) : $value,
            set: fn (string $value) => $this->useMutator ? (collect($this->statusText)->mapWithKeys(fn ($value, $key) => ([__($value) => $key]))[$value] ?? $value) : $value,
        );
    }
    public array $lvText = [
        1 => '超級使用者',
        2 => '工程師',
        3 => 'PM',
        4 => '網站管理者',
    ];
    protected function lv(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value,
            set: fn (string $value) => $this->useMutator ? (collect($this->lvText)->mapWithKeys(fn ($value, $key) => ([__($value) => $key]))[$value] ?? $value) : $value,
        );
    }

    /**
     * 後台操作測定
     */
    public function getValidatorRules()
    {
        return [
            'name' => 'required|unique:App\Models\User,name',
            'password' => $this->newPassword ? 'required' : '',
            'email' => 'required|email',
        ];
    }
    public function getValidatorMessage()
    {
        return [];
    }
    /**
     * 後台操作 列表 匯出
     */
    public function scopeFilter($query, array $Data)
    {
        //過濾選項
        if (isset($Data['filter_status'])) {
            $query->whereIn('status', (array) $Data['filter_status']);
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

}
