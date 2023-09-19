<?php

namespace App\Services\ThirdParty\Main;

use Illuminate\Support\Facades\Http;

/**
 * @example 此為範例class
 * 
 * 規範：
 * 檔名以公司名稱命名
 * 放串接設定、寫入log方法
 * 
 * Abc公司
 */
class AbcService
{
    public function __construct()
    {
    }

    /**
     * 取出串接設定
     */
    public function getSetting()
    {
    }

    /**
     * 寫入log
     */
    public function writeLog(string $message)
    {
    }
}
