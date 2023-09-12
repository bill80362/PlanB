<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Extensions\AccessTokenGuard;
use App\Models\User;
use stdClass;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest('custom-token', function (Request $request) {            
            // 這邊客製化驗證方式，如：讀資料庫token、第三方資料等等。
            if ('pass123' == $request->header('token')) {
                $obj = new stdClass();
                $obj->id = 1;
                $obj->id = "other-erp-company";
                return $obj;
            }
            return null;
            // return User::where('token', (string) $request->token)->first();
        });
    }
}
