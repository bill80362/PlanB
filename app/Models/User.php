<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Permission\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
    //狀態文字
    public array $Formal_Flag_Text = [
        1 => "非正式",
        2 => "正式",
    ];
    public array $Column_Title_Text = [
        "id" => "編號",
        "name" => "姓名",
        "email" => "Email",
        "password" => "密碼",
    ];
}
