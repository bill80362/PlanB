<?php

namespace App\Http\Middleware;

use App\Services\Route\RouteLanguageService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $segment = $request->segment(1);
        if (! in_array($segment, app(RouteLanguageService::class)->locales)) {
            //網址開頭不是語系碼，則使用預設語系
            return redirect('/'.config('app.locale').'/'.$request->path(), 307); //導轉夾帶POS參數
        }

        return $next($request);
    }
}
