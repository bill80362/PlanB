<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Services\Operate\SystemConfigService;

class LanguageSetting
{
    /**
     * 網址強制需要有語系，沒有會自動補上預設
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        if ($request->method() === 'GET') {
            $systemConfigService = app(SystemConfigService::class);
            $segment = $request->segment(1);
            if (!in_array($segment, $systemConfigService->locales)) {
                //
                $request->attributes->add(['company' => '123']);
                //網址開頭不是語系碼，則使用預設語系
                App::setLocale(config('app.fallback_locale'));
            }else{
                //網址開頭是語系碼
                App::setLocale($segment);
            }
//        }

        return $next($request);
    }
}
