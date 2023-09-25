<?php

namespace App\Models;

/**
 * 匯出
 */
trait ExportTrait
{
    public function scopeExport($query,$useMutator=true)
    {
        //整理匯出資料
        $ExportList = [];
        //要匯出的欄位
        $Column_Title_Text = $this->Column_Title_Text;
        //
        foreach ($this->Column_Title_Text as $key => $value){
            if( property_exists($this,$key."Text") ){
                $Title_Tail = collect($this->{$key."Text"})->map(fn($value,$key) => ($key.".".$value))->implode(",");
                $Column_Title_Text[$key] .= $Title_Tail;
            }
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
                $Temp[] = $model->$key ?? '';
            }
            //放入前先經過語系
            $ExportList[] = $Temp;
//            $ExportList[] = __($Temp);
        }

        //
        return $ExportList;
    }

    public function getTitleAttach(){
        $Column_Title_Text_Attach = [];
        foreach ($this->Column_Title_Text as $key => $value){
            if( property_exists($this,$key."Text") ){
                $Title_Tail = collect($this->{$key."Text"})->map(fn($value,$key) => ($key.".".$value))->implode(",");
                $Column_Title_Text_Attach[$key] = $Title_Tail;
            }
        }
        return $Column_Title_Text_Attach;
    }
}
