<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Permission\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable;
    use \OwenIt\Auditing\Auditable;

    protected $with = ['permissions'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        // 'saved' => UserSaved::class,
        // 'created' => xxx::class,
        // 'updated' => xxx::class,
        // 'deleted' => xxx::class,
    ];
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

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
    //欄位名稱
    public array $Column_Title_Text = [
        "id" => "編號",
        "name" => "姓名",
        "email" => "Email",
        "password" => "密碼",
        "status" => "狀態",
    ];
    public array $statusText = [
        "Y" => "啟用",
        "N" => "停用",
    ];
    //
    public String $newPassword="";
    public function getValidatorRules(){
        return [
            "name" => "required",
            "password" => $this->newPassword?"required":"",
            "email" => "required|email",
        ];
    }
    public function getValidatorMessage(){
        return [];
    }
    // ->filter($Data) 可以使用
    public function scopeFilter($query,Array $Data)
    {
        //過濾選項
        if ( isset($Data["filter_status"]) ) {
            $query->whereIn('status',(array)$Data["filter_status"]);
        }
        //過濾文字條件
        if ( isset($Data["filter_text_key"]) ) {
            $query->where($Data["filter_text_key"],'like', '%'.$Data["filter_text_value"].'%');
        }
        //排序
        if ( isset($Data["order_by"]) ) {
            $order_by = explode(",", $Data["order_by"]);
            $query->orderBy($order_by[0], $order_by[1]);
        }
        //
        return $query;
    }
    public function scopeExport($query)
    {
        //整理匯出資料
        $ExportList = [];
        //要匯出的欄位
        $Column_Title_Text = $this->Column_Title_Text;
        //放入標題
        $ExportList[] = array_values($Column_Title_Text);
        //要匯出的資料
        foreach ($query->get() as $model) {
            $Temp = [];
            foreach ($Column_Title_Text as $key => $value) {
                //將key轉value
                if($key=="status"){
                    $model->$key = $this->statusText[$model->$key];
                }
                //放入標題對應的資料
                $Temp[] = $model->$key ?? "";
            }
            $ExportList[] = $Temp;
        }
        //
        return $ExportList;
    }
    //判斷匯入的時候，新增或是更新
    public function scopeImportPrimary($query,array $UpdateData){
        if ( isset($UpdateData["id"]) ) {
            $query->where("id",$UpdateData["id"]);
        }else{
            $query->where("id",0);
        }
        //
        return $query;
    }
}
