<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language
{
    /**
     * 前台語系導轉功能 
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $param = $request->route()->parameter('lang');
        $urlPath =  $request->path();

        if (in_array($param, ['en', 'zh-tw'])) {
            $locale = $param;
        } else if (Session::has('locale')) {
            $locale = Session::get('locale');
            if ($request->method() == 'GET') {
                return redirect("/{$locale}/{$urlPath}");
            }
        } else {
            if ($request->method() == 'GET') {
                return redirect("/zh-tw/{$urlPath}");
            }
            $locale = 'zh-tw';
        }

        App::setLocale($locale);
        return $next($request);
    }
}
