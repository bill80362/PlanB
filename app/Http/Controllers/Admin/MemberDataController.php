<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\Common\ServiceMemberData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MemberDataController extends \App\Http\Controllers\Controller
{
    public function __construct(
        protected ServiceMemberData $oServiceMemberData,
        protected Request $request,
    ){}

    //列表
    public function listHTML(){
        $pageLimit = $this->request->get("pageLimit")?:10;//預設10
        //過濾條件
        $oModel = $this->oServiceMemberData->filter($this->request);
        //
        $Filter_Text_Key_Options = [

        ];
        //
        $Paginator = $oModel->paginate($pageLimit);
        //
        return view('admin/Member_Data/List', [
            'Paginator' => $Paginator,
            //
            'Model' => $this->oServiceMemberData->getModel(),
            "Filter_Text_Key_Options" => $Filter_Text_Key_Options,
        ]);
    }
    //編輯
    public function updateHTML($ID){
        if($ID){
            //修改
            $Data = $this->oServiceMemberData->getModel()->find($ID);
        }else{
            //新增
            $Data = $this->oServiceMemberData->getModel();
            //新增預設值
            $Data->ID = 0;
            $Data->Name = "";
        }
        //輸入驗證遭擋，會有舊資料，優先使用舊資料
        foreach ((array)$this->request->old() as $key => $value){
            if(!$value) continue;
            $Data->$key = $value;
        }
        //View
        return view('admin/Member_Data/Update', [
            'Data' => $Data,
        ]);
    }
    public function update($ID){
        //驗證資料
        $validator = Validator::make($this->request->all(), $this->oServiceMemberData->getModel()->ValidatorRules,$this->oServiceMemberData->getModel()->ValidatorMessage);
        //
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //
        if($ID){
            //修改
            $this->oServiceMemberData->getModel()->find($ID)->update($this->request->post());
        }else{
            //新增
            $Data = $this->request->post();
            $oMember_Data = $this->oServiceMemberData->getModel();
            $Data["MemberNum"] = $oMember_Data->formatMemberNum($this->oServiceMemberData->getModel()->count()+1);
            $this->oServiceMemberData->getModel()->create($Data);
        }
        //
        return view('alert_redirect', [
            'Alert' => "送出成功",
            'Redirect' => '/Member_Data?'.$this->request->getQueryString(),
        ]);
    }
    //刪除
    public function del(){
        $ID = $this->request->post("ID");
        //刪除
        $this->oServiceMemberData->getModel()->find($ID)->delete();
        //
        return view('alert_redirect', [
            'Alert' => "刪除成功",
            'Redirect' => '/Member_Data?'.$this->request->getQueryString(),
        ]);
    }
    //批次刪除
    public function delBatch(){
        $ID_Array = $this->request->post("ID");
        //刪除
        foreach ($ID_Array as $ID){
            $this->oServiceMemberData->getModel()->find($ID)->delete();
        }
        //
        return view('alert_redirect', [
            'Alert' => "刪除成功",
            'Redirect' => '/Member_Data?'.$this->request->getQueryString(),
        ]);
    }
    //批次修改排序
    public function sortBatch(){

    }
    //匯入
    public function import(){

    }
    //匯出
    public function export(){
        $ExportList = $this->oServiceMemberData->export($this->request);
        //匯出
        return (new Collection($ExportList))->downloadExcel("member_data.xlsx");
    }

}
