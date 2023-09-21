<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Services\Operate\SystemConfigService;

class LanguageRedirect
{
    /**
     * 網址強制需要有語系，自動補上預設
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //
        $systemConfigService = app(SystemConfigService::class);
        $segment = $request->segment(1);
        if (!in_array($segment, $systemConfigService->locales)) {
            //網址開頭不是語系碼，則使用預設語系
            return redirect("/" . config('app.fallback_locale') . "/" . $request->path(),307);//導轉夾帶POS參數
        }
        //
//        if ($request->method() === 'GET') {
//            $systemConfigService = app(SystemConfigService::class);
//            $segment = $request->segment(1);
//            if (!in_array($segment, $systemConfigService->locales)) {
//                //網址開頭不是語系碼，則使用預設語系
//                return redirect("/".config('app.fallback_locale')."/".$request->path());
//            }else{
//                //網址開頭是語系碼
//                App::setLocale($segment);
//            }
//        }

        return $next($request);
    }
}