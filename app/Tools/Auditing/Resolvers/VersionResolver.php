<?php
namespace App\Tools\Auditing\Resolvers;

use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\Auditable;

class VersionResolver implements \OwenIt\Auditing\Contracts\Resolver
{
    public static $uuid = "";
    /**
     * {@inheritdoc}
     */
    public static function resolve(Auditable $auditable = null): string
    {
        if(!self::$uuid){
            self::$uuid = Str::uuid();
        }
        return self::$uuid;
    }
}
