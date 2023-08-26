<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member\Member_Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MemberDataController extends \App\Http\Controllers\Controller
{
    //列表
    public function listHTML(Request $request){
        $pageLimit = 30;
        $oModel = new Member_Data();
        //
        if($request->get("Filter_Formal_Flag")){
            $oModel = $oModel->whereIn("Formal_Flag",(array)$request->get("Filter_Formal_Flag"));
        }
        if($request->get("Order_By")){
            $Order_By = explode("_",$request->get("Order_By"));
            $oModel = $oModel->orderBy($Order_By[0],$Order_By[1]);
        }
        //
        $Filter_Text_Key_Options = [

        ];
        //
        $Paginator = $oModel->paginate($pageLimit);
        //
        return view('admin/Member_Data/List', [
            'Paginator' => $Paginator,
            //
            'Model' => new Member_Data(),
            "Filter_Text_Key_Options" => $Filter_Text_Key_Options,
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
            $Data->Name = "";
        }
        //
        return view('admin/Member_Data/Update', [
            'Data' => $Data,
        ]);
    }
    public function update(Request $request,$ID){
        //驗證資料
        $validator = Validator::make($request->all(), [
            "Name" => "required",
        ],[
            "Name" => '姓名必填',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
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
            'Redirect' => '/Member_Data?'.$request->getQueryString(),
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
