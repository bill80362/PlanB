<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Operate\PermissionService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
    public function boot(PermissionService $permissionService): void
    {
        /**
         * @example 第三方驗證
         */
        Auth::viaRequest('custom-token', function (Request $request) {
            // 這邊客製化驗證方式，如：讀資料庫token、第三方資料等等。
            if ($request->header('token') == 'pass123') {
                $obj = new stdClass();
                $obj->id = 1;
                $obj->name = 'other-erp-company';

                return $obj;
            }

            return null;
            // return User::where('token', (string) $request->token)->first();
        });

        $actions = $permissionService->getPermissions();
        foreach ($actions as $action) {
            Gate::define($action['key'], function (User $user) use ($action) {
                $permKeys = $user->permissions->map(function ($item) {
                    return $item['perm_key'];
                })->toArray();

                return in_array($action['key'], $permKeys);
            });
        }
    }
}
