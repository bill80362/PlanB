<?php

namespace App\Providers;

use App\Models\Member\Member_Data;
use App\Services\Admin\Common\ServiceMemberData;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
//        $this->app->singleton(ServiceMemberData::class, function () {
//            return new ServiceMemberData(new Member_Data());
//        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
