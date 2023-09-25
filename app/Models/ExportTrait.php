<?php

namespace App\Models;

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
        //
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
