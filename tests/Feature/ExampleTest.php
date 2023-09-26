<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Rules\TwPhone;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ExampleTest extends TestCase
{
    /**
     * 測試客製化驗證
     */
    public function test_rule(): void
    {

        $validator = Validator::make([
            'phone' => '0910585824'
        ], [
            'phone' => ['required', new TwPhone()],
        ]);
        $check = $validator->passes();
        $this->assertTrue($check);
    }

    /**
     * 時間相關測試，如：訂單幾天後應結案、到貨幾天應發送訊息等等
     * @link https://laravel.com/docs/10.x/mocking#interacting-with-time
     */
    public function test_time(): void
    {
        /**
         * 建立訂單
         */
        // craeteOrder() 

        $this->travel(10)->days(function () {
            /**
             * 訂單應在10天結案
             */
            // overOrder()

            /**
             * 撈db確認訂單是否已結案
             */
        });


        $this->assertTrue(true);
    }
}
