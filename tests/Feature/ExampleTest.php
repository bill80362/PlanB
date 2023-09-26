<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Rules\TwPhone;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ExampleTest extends TestCase
{
    public function test_example(): void
    {
        // $converted = Str::of('privacy_statement')->camel();
        // dd($converted);
        $validator = Validator::make([
            'phone' => '0910585824'
        ], [
            'phone' => ['required', new TwPhone()],
        ]);
        $check = $validator->passes();
        $this->assertTrue($check);
    }
}
