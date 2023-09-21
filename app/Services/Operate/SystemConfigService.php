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

    public $SystemConfigKeyValue = [];
    public function __construct(protected SystemConfig $oSystemConfig)
    {
        //先將所有KEY建立好
        foreach ($this->oSystemConfig->SystemConfig as $key => $value){
            foreach ($value as $value2){
                $this->SystemConfigKeyValue[$value2["id"]] = "";
            }
        }
        // dd($this->oSystemConfig->all());
        //
//        $SystemConfigKeyValue = array_column($this->oSystemConfig->all()->toArray(),"content","id");
//        foreach ($SystemConfigKeyValue as $key => $value){
//
//        }
    }
}
