<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class MemberDataController extends \App\Http\Controllers\Controller
{
    //列表
    public function listHTML(){
        return view('admin/Member_Data/List', ['name' => 'Bill']);
    }
    //編輯
    public function updateHTML($ID){
        var_dump($ID);
    }
    public function update($ID){

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
