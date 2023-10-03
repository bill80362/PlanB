<?php

namespace Tests\Feature\ThirdParty;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\ThirdParty\Main\AbcService;
use App\Http\Controllers\API\OrderController;
use Mockery;
use Mockery\MockInterface;

class AbcTest extends TestCase
{

    /**
     * 模擬第三方測試
     */
    public function test_thirdparty(): void
    {
        $this->instance(
            AbcService::class,
            Mockery::mock(AbcService::class, function (MockInterface $mock) {
                $mock->shouldReceive('getPostData')  // 模擬 AbcService 的方法
                    ->with(1)  //應該要帶什麼參數
                    ->times(1) // 應該被執行幾次
                    ->andReturn([  // 模擬對方回傳
                        "userId" => 1,
                        "id" => 1,
                        "title" => 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit',
                        "body" => 'quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto'
                    ]);
            })
        );

        $response = $this->getJson(action([OrderController::class, 'queryOrder']), [
            'token' => 'pass123'
        ]);
        $response->assertStatus(200);
    }
}
