<?php

namespace App\Services\Operate;

use App\Models\ValidatorInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterToolService
{
    public $oModel;

    public function export(Array $Data,$oModel)
    {
        //整理匯出資料
        $ExportList = [];
        //要匯出的欄位
        $Column_Title_Text = $this->oModel->Column_Title_Text;
        //放入標題
        $ExportList[] = array_values($Column_Title_Text);
        //過濾條件
        $oModel = $this->filter($Data,$oModel);
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

    public function filter(Array $Data,$oModel)
    {
        //過濾條件
        $oModel = clone $oModel;
        if ( isset($Data["Filter_Formal_Flag"]) ) {
            $oModel = $this->oModel->whereIn("Formal_Flag", (array)$Data["Filter_Formal_Flag"]);
        }
        if ( isset($Data["Order_By"])) {
            $Order_By = explode("_", $Data["Order_By"]);
            $oModel = $oModel->orderBy($Order_By[0], $Order_By[1]);
        }
        return $oModel;
    }

}
