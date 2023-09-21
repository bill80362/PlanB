<?php

namespace App\Providers;

use App\Models\SystemConfig;
use App\Services\RouteLanguageService;
use App\View\Components\paginator\pageList;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

use App\Services\Operate\SystemConfigService;

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
    }

    /**
     * boot()負責初始化物件。
     */
    public function boot(): void
    {
        // 在測試環境中強制關閉 Lazy Loading
        Model::preventLazyLoading(!app()->isProduction());
        //路由使用，語言前置碼偵測
        $this->app->singleton(RouteLanguageService::class, function () {
            return new RouteLanguageService();
        });
    }
}
