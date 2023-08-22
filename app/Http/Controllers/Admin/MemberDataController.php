<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member\Member_Data;
use Illuminate\Http\Request;

class MemberDataController extends \App\Http\Controllers\Controller
{
    //列表
    public function listHTML(){
        $Member_Data_Paginate = Member_Data::paginate(15);
        //
        return view('admin/Member_Data/List', [
            'Paginate' => $Member_Data_Paginate
        ]);
    }
    //編輯
    public function updateHTML($ID){
        var_dump($ID);
    }
    public function update($ID){
        Member_Data::create([
            "MemberNum" => "M0001",
            "Login_Email" => "bill@gmail.com",
            "Login_Password" => "A123",
            "Member_Level_ID" => "1",
            "CellPhone" => "0911222333",
            "Email" => "bill@gmail.com",
            "Formal_Flag" => "1",
            "Sex" => "1",
            "Birthday" => "2020-11-11",
            "Country_ID" => "1",
            "City_ID" => "1",
            "Area_ID" => "1",
            "Area_No1" => "12",
            "Area_No2" => "133",
            "Address" => "AAABBASDADS",
            "Tel" => "062323339",
        ]);
    }
    //刪除
    public function del($ID){

    }
    //批次刪除
    public function delBatch(){

    }
    //批次修改排序
    public function sortBatch(){

    }
    //匯入
    public function importHTML(){

    }
    public function import(){

    }
    //匯出
    public function export(){

    }

}
