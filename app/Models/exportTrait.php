<?php

namespace App\Models;

/**
 * 匯出
 */
trait exportTrait
{
    public function scopeExport($query)
    {
        //整理匯出資料
        $ExportList = [];
        //要匯出的欄位
        $Column_Title_Text = $this->Column_Title_Text;
        //放入標題
        $ExportList[] = array_values($Column_Title_Text);
        //要匯出的資料
        foreach ($query->get() as $model) {
            $Temp = [];
            foreach ($Column_Title_Text as $key => $value) {
                //將key轉value
//                if ($key == 'status') {
//                    $model->$key = $this->statusText[$model->$key];
//                }
                //放入標題對應的資料
                $Temp[] = $model->$key ?? '';
            }
            $ExportList[] = $Temp;
        }

        //
        return $ExportList;
    }
}
