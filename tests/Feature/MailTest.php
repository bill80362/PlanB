<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\MailService;
use Mockery;
use Mockery\MockInterface;

class MailTest extends TestCase
{
    /**
     * 測試寄信
     * 
     * @example 如測試退款成功後，應該要發送一次退款通知信，並帶入正確的參數等等。
     */
    public function test_mail_send(): void
    {
        $this->instance(
            MailService::class,
            Mockery::mock(MailService::class, function (MockInterface $mock) {
                $mock->shouldReceive('send')
                    ->with('new_order', ['price' => 1500], 'sender_address@gmail.com', 'xxxx@xxxx.com')  //應該要帶什麼參數
                    ->times(1); // 應該被執行幾次
            })
        );

        $mailService = app(MailService::class);
        $mailService->send('new_order', ['price' => 1500], 'sender_address@gmail.com', 'xxxx@xxxx.com');
    }
}
