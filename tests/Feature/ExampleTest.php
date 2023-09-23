<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use stdClass;
use Illuminate\Support\Facades\Mail;
// use App\Services\MailService;
use App\Events\Notify\NewOrderEvent;

class ExampleTest extends TestCase
{
    public function test_example(): void
    {
        // $mailService = app(MailService::class);
        // $mailService->send('new_order', ['price' => 1500], 'sender_address@gmail.com', 'xxxx@xxxx.com');

        NewOrderEvent::dispatch([
            'order_num' => '12345',
            'price' => 999,
            'mail' => 'bcs@gmail.com'
        ]);

        $this->assertTrue(true);
    }
}
