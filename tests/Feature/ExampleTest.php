<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Mail\NewOrder;
use stdClass;
use Illuminate\Support\Facades\Mail;

class ExampleTest extends TestCase
{
    public function test_example(): void
    {
        $order = new stdClass;
        $order->price = 150;
        Mail::to("xxxx@xxxx.xxx")->send(new NewOrder($order));

        $this->assertTrue(true);
    }
}
