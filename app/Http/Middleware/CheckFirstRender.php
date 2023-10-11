<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckFirstRender
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //匯出功能統一不使用分開路由
        if(str_contains($request->route()->getName(), "_export")){
            return $next($request);
        }
        //偵測如果不是ajax，則是第一次render給外框即可
        if( $request->method()=="GET" && !$request->ajax()){
            return new response(view('operate.pages.render'));
        }elseif($request->method()=="GET" && $request->ajax()){
            //回覆值改寫JSON
            $response = $next($request);
            return response()->json([
                "content" => $response->getContent(),
                "debugbar" => debugbar()->getData(),
            ]);
        }
        //
        return $next($request);
    }
}
