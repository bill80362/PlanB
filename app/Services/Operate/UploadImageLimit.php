<?php

namespace App\Services\Operate;

use Illuminate\Support\Facades\Request;

class UploadImageLimit
{
    public array $Config = [
        "SystemConfig" => [
            "logo" => [
                "mimes" => ["jpeg","png","jpg","gif"],
                "dimensions" => [
                    "width" => 100,
                    "height" => 100,
                    "minWidth" => 100,
                    "minHeight" => 100,
                    "maxWidth" => 100,
                    "maxHeight" => 100,
                ],
                "max" => "1024",//1MB=1024
                "min" => "0",
            ],
        ],
    ];
    //轉驗證器使用
    public function getValidatorMine(){
        return "mimes:jpeg,png,jpg,gif";
    }
    public function getValidatorDimensions(){
        return "dimensions:width=100,height=200";
//        return "dimensions:minWidth=100,minHeight=200";
//        return "dimensions:maxWidth=100,maxHeight=200";
    }
    public function getValidatorMax(){
        return "max:1024";
    }
    public function getValidatorMin(){
        return "min:1024";
    }
    //前端顯示訊息
    public function viewTips($Class,$Column){
        foreach ($this->Config as $class => $value){
            if ($Class instanceof \App\Models\SystemConfig ) {

            }
        }
        echo 123;
        exit();

        return view("tools/upload_image_limit/tips",[
            "Data" => $this->Config[$Class][$Column],
        ]);
    }
}
