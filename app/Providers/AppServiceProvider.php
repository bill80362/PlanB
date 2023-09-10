<?php

namespace App\Providers;

use App\Services\SystemConfig;
use App\View\Components\paginator\pageList;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 不管是否被使用，都會直接先執行
     */
    public function register(): void
    {
        //
        $this->app->bind(SystemConfig::class, function ($app) {
            return new SystemConfig();
        });
//        $this->app->singleton(SystemConfig::class, function ($app) {
//            return new SystemConfig();
//        });
    }

    /**
     * 被使用才呼叫
     */
    public function boot(): void
    {
//        $this->app->singleton(SystemConfig::class, function ($app) {
//            return new SystemConfig();
//        });
    }
}
