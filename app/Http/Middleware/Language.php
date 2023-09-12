<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * @todo 沒語系需導轉，待補
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route()->parameter('lang');
        if (!in_array($locale, ['en', 'zh-tw'])) {
            $locale = 'zh-tw';
        }

        App::setLocale($locale);
        return $next($request);
    }
}
