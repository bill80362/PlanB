<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CountryAndShippingFee\Language;
use App\Http\Controllers\Operation\LanguageController;

class LanguageTest extends TestCase
{
    /**
     * 測試產生語系檔
     */
    public function test_make_file(): void
    {
        $languageController = app(LanguageController::class);
        $languageController->makeFile();
        $this->assertTrue(true);
    }
}
