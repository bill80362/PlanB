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
use Illuminate\Support\Facades\Event;
use App\Listeners;

/**
 * 通知測試程式
 */
class NotifyTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * 測試建立訂單時應該要發哪些通知及發送出數
     */
    public function test_create_new_order(): void
    {

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

        NewOrderEvent::dispatch([
            'orderNum' => '12345',
            'price' => 999,
            'mail' => 'bcs@test.com',
            'fromMail' => 'sys@test.com',
            'lineNotifyMessage' => 'line notify message test...'
        ]);

        $this->assertTrue(true);
    }

    /**
     * 測試Event與Listener 關聯
     */
    public function test_event_listener()
    {
        Event::fake();

        NewOrderEvent::dispatch([
            'orderNum' => '12345',
            'price' => 999,
            'mail' => 'bcs@test.com',
            'fromMail' => 'sys@test.com',
            'lineNotifyMessage' => 'line notify message test...'
        ]);
        Event::assertDispatched(NewOrderEvent::class);
        Event::assertListening(
            NewOrderEvent::class,
            Listeners\Notify\MailNotify::class,
        );
        Event::assertListening(
            NewOrderEvent::class,
            Listeners\Notify\LineNotify::class,
        );

        // Event::assertListening(
        //     NewOrderEvent::class,
        //     Listeners\Notify\SMSNotify::class,
        // );


        $this->assertTrue(true);
    }
}
