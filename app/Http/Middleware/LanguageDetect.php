<?php

namespace App\Http\Middleware;

use App\Tools\Lang\LanguageTranslator as Translator;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Operate\SystemConfigService;

class LanguageDetect
{
    /**
     * 後台語系切換偵測
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->session()->has("locale")){
            //使用切換後的語系
            App::setLocale($request->session()->get("locale"));
        }
        return $next($request);
    }
}
