<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_Data extends Model
{
    use HasFactory;

    protected $table = 'Member_Data';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'int';
    //
    public $timestamps = false;
    protected $dateFormat = 'U';
    const CREATED_AT = 'Build_Date';
    const UPDATED_AT = '';
    //
    protected $guarded = [];
    //狀態文字
    public array $Formal_Flag_Text = [
        1 => "非正式",
        2 => "正式",
    ];
    public array $Column_Title_Text = [
        "ID" => "編號",
        "Name" => "姓名",
        "MemberNum" => "會員編號",
        "UUID" => "第三方編號",
        "Formal_Flag" => "狀態",
        "Email" => "Email",
        "Cellphone" => "手機",
        "Tel" => "電話",
        "Birthday" => "生日",
        "LID" => "Line_ID",
        "UID" => "FB_ID",
        "Member_Level_ID" => "會員等級",
    ];

    public function formatMemberNum(int $number): string
    {
        return "M".str_pad($number,"8","0",STR_PAD_LEFT);
    }
}
