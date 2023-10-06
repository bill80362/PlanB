<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRequestHeaderDataType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        $r = $next($request);
//        dd($r);
        //不紀錄GET
        if( $request->method()=="GET" && !$request->ajax()){
            //
            return new response(view('operate.pages.render'));
        }

        return $next($request);
    }
}
