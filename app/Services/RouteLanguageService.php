<?php

namespace App\Services;

use App\Services\Operate\SystemConfigService;
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Support\Facades\App;
use Illuminate\Translation\Translator as LaravelTranslator;
use App\Models\CountryAndShippingFee\Language;
use Illuminate\Support\Str;

class RouteLanguageService
{
    //這邊不能使用response
    public function setLangNoRedirect(){
        $systemConfigService = app(SystemConfigService::class);
        $segment = request()->segment(1);
        if (!in_array($segment, $systemConfigService->locales)) {
            //
            //網址開頭不是語系碼，則使用預設語系
            App::setLocale(config('app.fallback_locale'));
            return "";
        }else{
            //網址開頭是語系碼
            App::setLocale($segment);
            return $segment;
        }
    }
}
