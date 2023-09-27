<?php

namespace App\Models;

/**
 * 匯出 匯入
 */
trait UploadImageLimitTrait
{
    //轉驗證器使用
    public function getUploadImageLimitMine($Column){
        //
        $Data = $this->UploadImageLimit[$Column]??[];
        if(!$Data) return "";
        //
        if(!$Data["mimes"]) return "";
        //
        return "mimes:".implode(",",$Data["mimes"]);
    }
    public function getUploadImageLimitDimensions($Column){
        //
        $Data = $this->UploadImageLimit[$Column]??[];
        if(!$Data) return "";
        //
        if(!$Data["dimensions"]) return "";
        //
        $dimensionsContent = [];
        foreach ($Data["dimensions"] as $key => $value){
            $dimensionsContent[] = "{$key}={$value}";
        }
        //
        if(!$dimensionsContent) return "";
        //
        return "dimensions:".implode(",",$dimensionsContent);
    }
    public function getUploadImageLimitMax($Column){
        //
        $Data = $this->UploadImageLimit[$Column]??[];
        if(!$Data) return "";
        //
        if(!$Data["max"]) return "";
        //
        return "max:".$Data["max"];
    }
    //前端顯示訊息
    public function viewUploadImageLimitTips($Column){
        //
        $Data = $this->UploadImageLimit[$Column]??[];
        if(!$Data) return "";
        //
        return view("tools/upload_image_limit/tips",[
            "Data" => $Data,
        ]);
    }
}
