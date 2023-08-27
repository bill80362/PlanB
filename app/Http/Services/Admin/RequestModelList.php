<?php

namespace App\Http\Services\Admin;

use App\Models\Member\Member_Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RequestModelList
{
   public function filter(Request $request,Model $oModel){
       //過濾條件
       if($request->get("Filter_Formal_Flag")){
           $oModel = $oModel->whereIn("Formal_Flag",(array)$request->get("Filter_Formal_Flag"));
       }
       if($request->get("Order_By")){
           $Order_By = explode("_",$request->get("Order_By"));
           $oModel = $oModel->orderBy($Order_By[0],$Order_By[1]);
       }
       return $oModel;
   }
   public function export(Request $request,Model $oModel){
       //整理匯出資料
       $ExportList = [];
       //要匯出的欄位
       $Column_Title_Text = $oModel->Column_Title_Text;
       //放入標題
       $ExportList[] = array_values($Column_Title_Text);
       //過濾條件
       $oModels = $this->filter($request,$oModel);
       //要匯出的資料
       foreach ($oModels->get() as $model){
           $Temp = [];
           foreach ($Column_Title_Text as $key => $value){
               //放入標題對應的資料
               $Temp[] = $model->$key??"";
           }
           $ExportList[] = $Temp;
       }
       //
       return $ExportList;
   }

}
