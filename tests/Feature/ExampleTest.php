<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\Notify\LineNotifyService;

class ExampleTest extends TestCase
{
    public function test_example(): void
    {
        $lineService = app(LineNotifyService::class);
        $this->assertTrue(true);
    }
}
