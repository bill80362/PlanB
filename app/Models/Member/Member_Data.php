<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member_Data extends Authenticatable
{
    use HasFactory;

    protected $table = 'member_data';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $guarded = [];

    //狀態文字
    public array $Formal_Flag_Text = [
        1 => '非正式',
        2 => '正式',
    ];

    public array $Column_Title_Text = [
        'id' => '編號',
        'name' => '姓名',
        'UUID' => '第三方編號',
        'Formal_Flag' => '狀態',
        'Email' => 'Email',
        'Cellphone' => '手機',
        'Tel' => '電話',
        'Birthday' => '生日',
        'LID' => 'Line_ID',
        'UID' => 'FB_ID',
        'Member_Level_ID' => '會員等級',
    ];

    public function getValidatorRules()
    {
        $Array = [
            'Name' => 'required',
        ];

        return $Array;
    }

    public function getValidatorMessage()
    {
        $Array = [
            //            "Name" => ':attribute 必填',
        ];

        return $Array;
    }
}
