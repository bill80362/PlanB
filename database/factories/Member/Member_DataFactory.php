<?php

namespace Database\Factories\Member;

use App\Models\Member\Member_Data;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Member_DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Email = fake()->unique()->safeEmail();
        $Cellphone = "0921".rand(111111,999999);
        //
        return [
            //
            'MemberNum' => "M".str_pad(Member_Data::all()->count(),"8","0",STR_PAD_LEFT),
            "Login_Email" => $Cellphone,
            'Name' => fake()->name(),
            'Login_Password' => "123",
            'Member_Level_ID' => 1,
            'LID' => null,
            'UID' => null,
            'CellPhone' => $Cellphone,
            'Email' => $Email,
            'Formal_Flag' => 1,
            'Sex' => 1,
            'Birthday' => "1900-01-01",
            'Country_ID' => 1,
            'City_ID' => 1,
            'Area_ID' => 1,
            'Area_No1' => 111,
            'Area_No2' => 122,
            'Address' => "測試地址",
            'Tel' => $Cellphone,
            'Remark_Item' => "",
            'Remark' => "",

        ];
    }
}
