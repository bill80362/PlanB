<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * 匯出
 */
trait ExportTrait
{
    public function scopeExport($query,$useMutator=true)
    {
        //
        $Column_Title_Text_Attach = $this->getTitleAttach();
        //整理匯出資料
        $ExportList = [];
        //要匯出的欄位
        $Column_Title_Text = $this->Column_Title_Text;
        //要匯出的欄位，後面補上參數
        foreach ($this->Column_Title_Text as $key => $value){
            $Column_Title_Text[$key] .= $Column_Title_Text_Attach[$key]??"";
        }
        //放入標題
        $ExportList[] = array_values($Column_Title_Text);
        //要匯出的資料
        foreach ($query->get() as $model) {
            //是否使用轉狀態文字，否=key 是=文字
            $model->useMutator = $useMutator;
            //
            $Temp = [];
            foreach ($Column_Title_Text as $key => $value) {
                //將key轉value
//                if ($key == 'status') {
//                    $model->$key = $this->statusText[$model->$key];
//                }
                //放入標題對應的資料
                $Text = $model->$key ?? '';
                //經過語系
                $Temp[] = __($Text);
            }
            //放入前先經過語系
            $ExportList[] = $Temp;
        }

        //
        return $ExportList;
    }
    /**
     * 將標題列分析，確認欄位順序對應的KEY值 EX [0=>id,1=>name]
     *
     * @param array $DataArray 匯入的資料，三層陣列 sheet -> row -> column ，這邊只處裡第一個sheet
     */
    public function getImportIndexToKey(array $DataArray){
        //匯入匯出的標題參數尾部
        $Column_Title_Text_Attach = $this->getTitleAttach();
        //根據第一列標題判斷對應的欄位
        $value_to_key = array_flip($this->Column_Title_Text);
        $excelIndex = [];
        foreach ($DataArray[0] as $RowKey => $Row) {
            //只跑第一行
            if ($RowKey > 0) {
                break;
            }
            foreach ($Row as $index => $columnTitle) {
                //先移除狀態說明尾部 ex: 【狀態Y.啟用,N.停用】，只能夠輪巡方式全部跑過一遍，將尾部移除
                foreach ($Column_Title_Text_Attach as $value){
                    $columnTitle = str_replace($value,"",$columnTitle);
                }
                //經過語系
                $columnTitle = __($columnTitle);
                //匯入資料欄位標題異常
                if (!isset($value_to_key[$columnTitle])) {
                    return redirect("/operate/user?" . $this->request->getQueryString())->with(['error' => '匯入標題異常']);
                }
                //
                $excelIndex[$index] = $value_to_key[$columnTitle];
            }
        }
        //
        return $excelIndex;
    }
    /**
     * 匯入資料
     *
     * @param array $DataArray 匯入的資料，三層陣列 sheet -> row -> column ，這邊只處裡第一個sheet
     *
     * @return array 匯入被驗證器擋下的資料
    */
    public function importData(array $DataArray){
        //
        //根據標題，取的欄位順序對應的key
        $ImportIndexToKey = $this->getImportIndexToKey($DataArray);
        //
        $AllMessage = [];
        foreach ((array) $DataArray[0] as $RowKey => $Row) {
            //第一列標題，跳過
            if ($RowKey == 0) {continue;}
            //資料對應整理
            $UpdateData = [];
            foreach ($Row as $index => $columnValue) {
                //特殊處理欄位
                if ($ImportIndexToKey[$index] == 'password') {
                    $this->newPassword = (string)$columnValue;
                    $UpdateData[$ImportIndexToKey[$index]] = Hash::make($columnValue);
                } else {
                    $UpdateData[$ImportIndexToKey[$index]] = $columnValue;
                }
            }
            //整理要更新的資料
            $DataModel = $this->importPrimary($UpdateData)->first();
            if (!$DataModel) {
                $DataModel = clone $this; //沒有對應的資料，init一個
            }
            foreach ($UpdateData as $ColumnTitle => $value) {
                if ($ColumnTitle == 'password') {
                    $DataModel->newPassword = $value;
                }
                //經過語系
                $DataModel->$ColumnTitle = $value;
            }
            //驗證資料
            $validator = Validator::make(
                $DataModel->makeVisible('password')->toArray(),
                $this->getValidatorRules(),
                $this->getValidatorMessage(),
            );
            //驗證有誤
            if ($validator->fails()) {
                $AllMessage[] = __("第 :KEY1 列",["KEY1"=>$RowKey]). ":" . implode(',', $validator->messages()->all());
                continue;
            }
            $DataModel->save();
        }
        return $AllMessage;
    }

    //匯入匯出的標題參數尾部 ex: 【狀態Y.啟用,N.停用】 "Y.啟用,N.停用"
    public function getTitleAttach(){
        $Column_Title_Text_Attach = [];
        foreach ($this->Column_Title_Text as $key => $value){
            if( property_exists($this,$key."Text") ){
                //要經過語系
                $Title_Tail = collect($this->{$key."Text"})->map(fn($Text,$key) => ($key.".".__($Text)))->implode(",");
                $Column_Title_Text_Attach[$key] = $Title_Tail;
            }
        }
        return $Column_Title_Text_Attach;
    }
}
