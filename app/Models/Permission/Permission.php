<?php

namespace App\Models\Permission;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Permission extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable; //操作Log

    public $incrementing = true;

    protected $keyType = 'int';

    // protected $table = 'table name';

    /**
     * 欄位新增修改的黑名單，注意 create()會吃到，save（）不會吃到
     * 如果create()想要先關閉guarded，可以使用  Model::unguard(); ，通常用於seed的時候
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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

    public array $Column_Title_Text = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
