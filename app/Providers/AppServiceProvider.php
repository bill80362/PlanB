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
     * 根據SOLID的單一職責原則，register()只負責service container的register與binding，
     * PS:
     * 這邊很適合用來做客製化類別綁定，根據專案製作一個專屬Provider，後面被執行的會覆蓋前面的
     */
    public function register(): void
    {
        //
        $this->app->bind(SystemConfig::class, function ($app) {
            return new SystemConfig("register1");
        });
        $this->app->bind(SystemConfig::class, function ($app) {
            return new SystemConfig("register2");
        });
//        $this->app->singleton(SystemConfig::class, function ($app) {
//            return new SystemConfig();
//        });
    }

    /**
     * boot()負責初始化物件。
     */
    public function boot(): void
    {
        //會蓋掉原本的
//        $this->app->singleton(SystemConfig::class, function ($app) {
//            return new SystemConfig("boot");
//        });
    }
}
