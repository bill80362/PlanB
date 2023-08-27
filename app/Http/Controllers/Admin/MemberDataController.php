<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\Admin\RequestModelList;
use App\Models\Member\Member_Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MemberDataController extends \App\Http\Controllers\Controller
{
    public function __construct(
        protected RequestModelList $oRequestModelList,
    ){}

    //列表
    public function listHTML(Request $request){
        $pageLimit = $request->get("pageLimit")?:10;//預設10
        //過濾條件
        $oModel = $this->oRequestModelList->filter($request,new Member_Data());
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
            //修改
            $Data = Member_Data::find($ID);
        }else{
            //新增
            $Data = new Member_Data();
            //新增預設值
            $Data->ID = 0;
            $Data->Name = "";
        }
        //輸入驗證遭擋，會有舊資料，優先使用舊資料
        foreach ((array)$request->old() as $key => $value){
            if(!$value) continue;
            $Data->$key = $value;
        }
        //View
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
            //修改
            Member_Data::find($ID)->update($request->post());
        }else{
            //新增
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
    public function del(Request $request){
        $ID = $request->post("ID");
        //刪除
        Member_Data::find($ID)->delete();
        //
        return view('alert_redirect', [
            'Alert' => "刪除成功",
            'Redirect' => '/Member_Data?'.$request->getQueryString(),
        ]);
    }
    //批次刪除
    public function delBatch(){

    }
    //批次修改排序
    public function sortBatch(){

    }
    //匯入
    public function import(){

    }
    //匯出
    public function export(Request $request){
        $ExportList = $this->oRequestModelList->export($request,new Member_Data());
        //匯出
        return (new Collection($ExportList))->downloadExcel("member_data.xlsx");
    }

}
