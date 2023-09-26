<?php

namespace App\Services\Route;

use Illuminate\Support\Facades\App;

class RouteLanguageService
{
    //前台開放的語系碼
    public array $locales = ['en', 'zh-tw'];

    //這邊不能使用response
    public function setLangNoRedirect()
    {
        $segment = request()->segment(1);
        if (! in_array($segment, $this->locales)) {
            //網址開頭不是語系碼，則使用預設語系
            App::setLocale(config('app.locale'));
            return '';
        } else {
            //網址開頭是語系碼
            App::setLocale($segment);

            return $segment;
        }
    }
}
