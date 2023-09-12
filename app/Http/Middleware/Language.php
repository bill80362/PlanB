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
     * 
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $param = $request->route()->parameter('lang');

        if (in_array($param, ['en', 'zh-tw'])) {
            $locale = $param;
        } else if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            $locale = 'zh-tw';
        }


        App::setLocale($locale);
        return $next($request);
    }
}
