<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Services\Operate\SystemConfigService;

class Language
{
    /**
     * 前台語系導轉功能 
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // app()->singleton(RouteLanguageService::class, function () {
        //     return new RouteLanguageService();
        // });
        // $this->app->extend('translator', function ($command, $app) {
        //     $loader = $app['translation.loader'];
        //     $locale = $app->getLocale();
        //     $trans = new Translator($loader, $locale);
        //     $trans->setFallback($app->getFallbackLocale());
        //     return $trans;
        // });
        return $next($request);
    }
}
