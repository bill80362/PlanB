<?php

namespace App\Services;

class SystemConfig
{
    public string $TestConfigData;

    public function __construct($T)
    {
        //這邊看跑幾次
//        echo "@@@";
//        //從DB提取變數
        $this->TestConfigData = $T;
    }
}
