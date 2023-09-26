<?php

namespace App\Http\Middleware;

use App\Tools\OnlineUser\OnlineUserTool;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlineUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //線上人數
        $key = session()->getId();
        $value = $request->url();
        app(OnlineUserTool::class)->setOnline($key, $value);

        //
        return $next($request);
    }
}
