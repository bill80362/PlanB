<?php

namespace App\Providers;

// use Illuminate\Translation\Translator;
use App\Services\LanguageService as Translator;
use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * 參考原laravel provider寫法及 Translator 寫法並繼承覆寫get方法。
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend('translator', function ($command, $app) {
            $loader = $app['translation.loader'];
            $locale = $app->getLocale();
            $trans = new Translator($loader, $locale);
            $trans->setFallback($app->getFallbackLocale());
            return $trans;
        });
    }
}
