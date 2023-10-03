<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\DataProvider;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * GET路由測試，如果為500才會測試錯誤。
     */
    public function test_check_all_route()
    {
        $user = User::find(1);
        $routeCollection = Route::getRoutes();

        $params = [
            ['{id}', '1'],
            ['{type}', 'key'],
            ['{locale}', 'zh-tw'],
            ['{companyKey}', 'privacy_statement']
        ];

        foreach ($routeCollection->get('GET') as $value) {
            if (Str::startsWith($value->uri, [
                'oauth', 'api',
                '_debugbar', 'sanctum',
                '_ignition'
            ])) {
                continue;
            }

            $urlContent = $value->uri;
            foreach ($params as $param) {
                $urlContent = Str::replace($param[0], $param[1], $urlContent);
            }
            $response = $this->actingAs($user, 'operate')->call($value->methods[0], '/' . $urlContent);
            dump($value->methods[0] . " " . $urlContent . " " . $response->getStatusCode());
            $this->assertNotEquals(500, $response->getStatusCode(), "{$value->methods[0]} {$urlContent}");
        }

        $this->assertTrue(true);
    }
}
