<?php

namespace App\Services\Operate;

class SystemConfigService
{
    //開放的語系碼
    public array $locales = ['en', 'zh-tw'];

    public $useLangPrefix = true;
    public int $versionJS = 1;

    public function __construct()
    {
    }
}
