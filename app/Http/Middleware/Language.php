<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Tools\Lang\LanguageTranslator as Translator;

class Language
{
    /**
     * 覆寫掉 Translator get功能
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        app()->extend('translator', function ($command, $app) {
            $loader = $app['translation.loader'];
            $locale = $app->getLocale();
            $trans = new Translator($loader, $locale);
            $trans->setFallback($app->getFallbackLocale());
            return $trans;
        });
        return $next($request);
    }
}
