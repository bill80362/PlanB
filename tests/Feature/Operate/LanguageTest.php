<?php

namespace Tests\Feature\Operate;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CountryAndShippingFee\Language;
use App\Http\Controllers\Operation\LanguageController;

/**
 * 測試controller範例
 */
class LanguageTest extends TestCase
{
    /**
     * 
     * 測試產生語系檔
     */
    public function test_make_file(): void
    {
        $response = $this->postJson(action([LanguageController::class, 'makeFile']), []);
        $response->assertStatus(200);
    }
}
