<?php

namespace App\Services\Operation;

use App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class Master
{
    public function getModel(){
        return clone $this->oModel;
    }
    public function getValidator(Request $request){
        return Validator::make(
            $request->all(),
            $this->getModel()->getValidatorRules(),
            $this->getModel()->getValidatorMessage(),
        );
    }
    public function update(Request $request,$ID){
        if($ID){
            //修改
            $this->getModel()->find($ID)->update($request->post());
        }else{
            //新增
            $Data = $request->post();
            $oMember_Data = $this->getModel();
            $Data["MemberNum"] = $oMember_Data->formatMemberNum($this->getModel()->count()+1);
            $this->getModel()->create($Data);
        }
    }
    public function export(Request $request)
    {
        //整理匯出資料
        $ExportList = [];
        //要匯出的欄位
        $Column_Title_Text = $this->oModel->Column_Title_Text;
        //放入標題
        $ExportList[] = array_values($Column_Title_Text);
        //過濾條件
        $oModel = $this->filter($request);
        //要匯出的資料
        foreach ($oModel->get() as $model) {
            $Temp = [];
            foreach ($Column_Title_Text as $key => $value) {
                //放入標題對應的資料
                $Temp[] = $model->$key ?? "";
            }
            $ExportList[] = $Temp;
        }
        //
        return $ExportList;
    }

    public function filter(Request $request)
    {
        //過濾條件
        $oModel = clone $this->oModel;
        if ($request->get("Filter_Formal_Flag")) {
            $oModel = $this->oModel->whereIn("Formal_Flag", (array)$request->get("Filter_Formal_Flag"));
        }
        if ($request->get("Order_By")) {
            $Order_By = explode("_", $request->get("Order_By"));
            $oModel = $oModel->orderBy($Order_By[0], $Order_By[1]);
        }
        return $oModel;
    }

}
