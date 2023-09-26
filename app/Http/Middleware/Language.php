<?php

namespace App\Http\Middleware;

use App\Tools\Lang\LanguageTranslator as Translator;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Operate\SystemConfigService;

class Language
{

    public function __construct(
        protected SystemConfigService $oSystemConfigService
    ) {
    }

    /**
     * 覆寫掉 Translator get功能
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //覆寫 __(語系文字) 功能 需要寫入DB
        app()->extend('translator', function ($command, $app) {
            $loader = $app['translation.loader'];
            $locale = $app->getLocale();
            $values = $this->oSystemConfigService->SystemConfigKeyValue;
            $trans = new Translator($loader, $locale, $values['use_url_map'] == 'Y');
            $trans->setFallback($app->getFallbackLocale());

            return $trans;
        });

        return $next($request);
    }
}
