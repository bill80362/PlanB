<?php

namespace App\Providers;

use App\Services\RouteLanguageService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Client\PendingRequest;
use App\Http\Middleware\HttpLog;
use Illuminate\Support\Facades\Http;

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
        Paginator::useBootstrapFive();
        //
        PendingRequest::macro('log', function (
            $channel = '',
            $context = [],
            $config = []
        ): PendingRequest {
            return Http::withMiddleware((new HttpLog())->__invoke($channel, $context, $config));
        });
    }
}
