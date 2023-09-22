<?php

namespace Tests\Feature\Operate;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CountryAndShippingFee\Language;
use App\Http\Controllers\Operation\LanguageController;
use App\Models\User;
use Illuminate\Support\Facades\Session;

/**
 * 測試controller範例
 */
class LanguageTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }


    /**
     * 
     * 測試產生語系檔 沒登入？
     */
    public function test_make_file_no_login(): void
    {
        $response = $this->postJson(action([LanguageController::class, 'makeFile']), []);
        $response->assertStatus(401);
    }

    /**
     * 
     * 測試產生語系檔
     */
    public function test_make_file(): void
    {
        $user = User::find(1);
        $this->actingAs($user, 'operate');

        $response = $this->postJson(action([LanguageController::class, 'makeFile']), []);
        $response->assertStatus(302);
        $this->assertFalse(Session::has('errors')); //確認有送錯誤訊息給前端
    }
}
