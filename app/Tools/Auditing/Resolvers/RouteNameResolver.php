<?php
namespace App\Tools\Auditing\Resolvers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\Auditable;

class RouteNameResolver implements \OwenIt\Auditing\Contracts\Resolver
{
    public static $uuid = "";
    /**
     * {@inheritdoc}
     */
    public static function resolve(Auditable $auditable = null): string
    {
        if (App::runningInConsole()) {
            return 'console';
        }

        return Request::route()->getName();
    }
}
