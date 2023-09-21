<?php

namespace App\Services\Operate;

use App\Models\SystemConfig;

class SystemConfigService
{
    //開放的語系碼
    public array $locales = ['en', 'zh-tw'];

    public $useLangPrefix = true;
    public int $versionJS = 1;
    public bool $autoLangToDB = true;

    //
    public array $SystemConfigKeyValue = [];//所有變數KEY VALUE
    public array $SystemConfigImageKey = [];//屬於圖片的KEY

    public function __construct(protected SystemConfig $oSystemConfig) {
        $this->loadSystemConfigKeyValue();
    }

    //這邊測試如果再初始化就載入，會ERROR，因為還不能拉DB
    public function loadSystemConfigKeyValue(): void
    {
        //先將所有KEY建立好
        foreach ($this->oSystemConfig->SystemConfig as $key => $value){
            foreach ($value as $value2){
                $this->SystemConfigKeyValue[$value2["id"]] = "";
                if($value2["input"]=="img"){
                    $this->SystemConfigImageKey[] = $value2["id"];
                }
            }
        }
        //從DB載入資料
        $SystemConfigKeyValue = array_column($this->oSystemConfig->all()->toArray(),"content","id");
        foreach ($SystemConfigKeyValue as $key => $value){
            $this->SystemConfigKeyValue[$key] = $value;
        }
    }
//    public function getSystemConfigKeyValue(){
//        $this->SystemConfigKeyValue || $this->loadSystemConfigKeyValue();
//        return $this->SystemConfigKeyValue;
//    }
}
