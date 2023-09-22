<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogResponseInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //
        if ($request->method() == 'GET') {
            return $next($request);
        }
        //紀錄response
        $response = $next($request);
        //透過guard區分log
        if (auth('erp')->check()) {
            Log::channel('erp_access')->info($response->getContent());
            //        } elseif (auth('api')->check()) {
            //            Log::channel('api_access')->info($request->getContent());
        } elseif (auth('operate')->check()) {
            //紀錄 getContent 會有全部HTML，只記錄Code
            Log::channel('operate_access')->info($response->getStatusCode());
            //        } elseif (auth('front')->check()) {
            //            //前台登入
            //            Log::channel('front_access')->info($response->getStatusCode());
        } else {
            //未登入
            Log::channel('others_access')->info($response->getStatusCode());
        }

        return $response;
    }
}
