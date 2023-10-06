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
        //偵測如果不是ajax，則是第一次render給外框即可
        if( $request->method()=="GET" && !$request->ajax()){
            return new response(view('operate.pages.render'));
        }elseif($request->method()=="GET" && $request->ajax()){
            // Get the response
//            $response = $next($request);
            // If the response is not strictly a JsonResponse, we make it
//            if (!$response instanceof JsonResponse) {
//                $response = $this->factory->json(
//                    $response->content(),
//                    $response->status(),
//                    $response->headers->all()
//                );
//            }

//            return $response;
        }
        //

        return $next($request);
    }
}
