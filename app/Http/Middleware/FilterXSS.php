<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilterXSS
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userInput = $request->all();
        array_walk_recursive($userInput, function (&$userInput) {
            //前台建議使用
            $userInput = strip_tags($userInput);
        });
        $request->merge($userInput);
        return $next($request);
    }

}
