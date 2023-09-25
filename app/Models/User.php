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
    use ExportTrait; //匯出

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
    public array $statusText = [
        'Y' => '啟用',
        'N' => '停用',
    ];

    public array $lvText = [
        1 => '超級使用者',
        2 => '工程師',
        3 => 'PM',
        4 => '網址管理者',
        5 => '使用者',
    ];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->statusText[$value] ?? $value,
            set: fn (string $value) => array_flip($this->statusText)[$value] ?? $value,
        );
    }
    /**
     * 後台操作測定
     */
    public function getValidatorRules()
    {
        return [
            'name' => 'required',
            'password' => $this->newPassword ? 'required' : '',
            'email' => 'required|email',
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
