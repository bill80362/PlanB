<?php

namespace Tests\Feature\Operate;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;

/**
 * 從route測試
 */
class UserTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $user = User::find(1);
        User::factory()->create();
        $this->actingAs($user, 'operate');
    }

    /**
     * 列表頁
     */
    public function test_user_list(): void
    {

        $response = $this->get('/operate/user');
        $response->assertStatus(200);
    }
    /**
     * 更新頁
     */
    public function test_user_update_html(): void
    {
        $model = User::where('id', '!=', 1)->first();
        $response = $this->get('/operate/user/' . $model->ID);
        $response->assertStatus(200);
    }

    /**
     * 更新
     * 可驗證是否有正確寫入資料庫
     */
    public function test_user_update(): void
    {
        $name = 'admin12345678910'; 
        $model = User::where('id', '!=', 1)->first();
        $response =  $this->post('/operate/user/' . $model->id, [
            "name" => $name,
            "email" => 'test@test.com',
            "password" => Hash::make('1234567')
        ]);
        $checkUser = User::whereId($model->id)->first();

        $response->assertStatus(200);
        $this->assertTrue($checkUser->name == $name); //驗證姓名是否有正確寫入資料庫
    }

    /**
     * 更新，驗證欄位
     */
    public function test_user_update_necessary(): void
    {
        $model = User::where('id', '!=', 1)->first();
        $response = $this->post('/operate/user/' . $model->id, ["name" => "", 'password' => '']);
        $response->assertStatus(302); // 確認導回
        $this->assertTrue(Session::has('errors')); //確認有送錯誤訊息給前端
    }

    /**
     * 刪除，驗證欄位
     */
    public function test_user_del(): void
    {
        $model = User::where('id', '!=', 1)->first();
        $response = $this->post('/operate/user/del', ["id_array" => [$model->id]]);
        $response->assertStatus(200);

        $this->assertModelMissing($model);
    }
}
