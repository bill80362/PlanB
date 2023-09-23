<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Events\Notify\NewOrderEvent;
use Mockery;
use Mockery\MockInterface;
use App\Services\Notify\MailService;
use App\Services\Notify\LineNotifyService;
use App\Services\Notify\SMSService;

/**
 * 通知測試程式
 */
class NotifyTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        // 寄mail
        $this->instance(
            MailService::class,
            Mockery::mock(MailService::class, function (MockInterface $mock) {
                $mock->shouldReceive('send')
                    ->times(1); // 應該被執行幾次
            })
        );

        // line notify
        $this->instance(
            LineNotifyService::class,
            Mockery::mock(LineNotifyService::class, function (MockInterface $mock) {
                $mock->shouldReceive('send')
                    ->times(1); // 應該被執行幾次
            })
        );

        // 簡訊
        $this->instance(
            SMSService::class,
            Mockery::mock(SMSService::class, function (MockInterface $mock) {
                $mock->shouldReceive('send')
                    ->times(0); // 應該被執行幾次
            })
        );
    }

    /**
     * 測試建立訂單時應該要發哪些通知？
     */
    public function test_create_new_order(): void
    {
        NewOrderEvent::dispatch([
            'order_num' => '12345',
            'price' => 999,
            'mail' => 'bcs@gmail.com'
        ]);

        $this->assertTrue(true);
    }
}
