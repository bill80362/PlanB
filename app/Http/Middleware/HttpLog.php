<?php

namespace App\Http\Middleware;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;

class HttpLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function __invoke($channel, $context = [], $config = []): callable
    {
        return function (callable $handler) use ($channel, $context, $config): callable {
            return function (Request $request, array $options) use ($channel, $context, $config, $handler): PromiseInterface {
                $start = microtime(true);
                $promise = $handler($request, $options);

                return $promise->then(
                    function (Response $response) use ($channel, $context, $config, $request, $start) {
                        $sec = microtime(true) - $start;
                        Log::channel($channel)->info('', [
                            'uri' => $request->getUri()->__toString(),
                            'method' => $request->getMethod(),
                            'request' => $request->getBody()->getContents(),
                            'response' => $response->getBody()->getContents(),
                            'statusCode' => $response->getStatusCode(),
                            'sec' => $sec,
                            'context' => $context,
                            'config' => $config,
                        ]);

                        return $response;
                    }
                );
            };
        };
    }
}
