<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member\Member_Data;
use Illuminate\Http\Request;

class MemberDataController extends \App\Http\Controllers\Controller
{
    //列表
    public function listHTML(){
        $pageLimit = 30;
        $Paginator = Member_Data::paginate($pageLimit);
        //
        return view('admin/Member_Data/List', [
            'Paginator' => $Paginator,
        ]);
    }
    //編輯
    public function updateHTML(Request $request,$ID){
        if($ID){
            $Data = Member_Data::find($ID);
        }else{
            $Data = new Member_Data();
            //新增預設值
            $Data->ID = 0;
            $Data->Name = $request->old("Name");
        }
        //
        return view('admin/Member_Data/Update', [
            'Data' => $Data,
        ]);
    }
    public function update(Request $request,$ID){
        //
        $request->validate([
            "Name" => "require",
        ]);

        //
        if($ID){
            Member_Data::find($ID)->update($request->post());
        }else{
            $Data = $request->post();
            $oMember_Data = new Member_Data();
            $Data["MemberNum"] = $oMember_Data->formatMemberNum(Member_Data::count()+1);
            Member_Data::create($Data);
        }
        //
        return view('alert_redirect', [
            'Alert' => "送出成功",
            'Redirect' => '/Member_Data',
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
