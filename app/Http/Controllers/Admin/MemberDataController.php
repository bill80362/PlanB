<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member\Member_Data;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MemberDataController extends \App\Http\Controllers\Controller
{
    //列表
    public function listHTML(Request $request){
        $pageLimit = 10;
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
        $Data = Member_Data::find($ID);
        $Data->delete();
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
    public function import(){

    }
    //匯出
    public function export(){
        //整理匯出資料
        $ExportList = [];
        //要匯出的欄位
        $Column_Title_Text = (new Member_Data)->Column_Title_Text;
        //標題
        $Temp = [];
        foreach ($Column_Title_Text as $key => $value){
            $Temp[] = $value;
        }
        $ExportList[] = $Temp;
        //要匯出的資料
        foreach (Member_Data::all() as $model){
            $Temp = [];
            foreach ($Column_Title_Text as $key => $value){
                $Temp[] = $model->$key??"";
            }
            $ExportList[] = $Temp;
        }
        //匯出
        return (new Collection($ExportList))->downloadExcel("member_data.xlsx");
    }

}
