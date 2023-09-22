<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequestInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //不紀錄GET
        if($request->method()=="GET") return $next($request);

        //透過guard區分log
        if (auth('erp')->check()) {
            Log::channel('erp_access')->info($request->all());
//        } elseif (auth('api')->check()) {
//            Log::channel('api_access')->info($request->all());
        } elseif (auth('operate')->check()) {
            Log::channel('operate_access')->info($request->all());
//        } elseif (auth('front')->check()) {
//            Log::channel('front_access')->info($request->all());
        } else {
            Log::channel('others_access')->info($request->all());
        }

        return $next($request);
    }
}
