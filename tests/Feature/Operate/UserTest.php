<?php

namespace Tests\Feature\Operate;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Models\Permission\Permission;

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
     * 可驗證是否有正確寫入資料庫、測試加入權限
     */
    public function test_user_update_add_perm(): void
    {
        $name = 'admin12345678910';
        $model = User::where('id', '!=', 1)->first();
        $response = $this->post('/operate/user/' . $model->id, [
            'name' => $name,
            'email' => 'test@test.com',
            'password' => Hash::make('1234567'),
            'memberLevel_read' => 'on',
        ]);
        $checkUser = User::whereId($model->id)->first();

        $permission = Permission::where('perm_key', 'memberLevel_read')->where('user_id', $model->id)->first();
        $response->assertStatus(302);
        $this->assertSame($name, $checkUser->name, '名字更新失敗'); //驗證姓名是否有正確寫入資料庫
        $this->assertNotNull($permission, '權限沒有被加上');
    }

    /**
     * 更新
     * 測試移除權限
     */
    public function test_user_update_remove_perm(): void
    {
        $model = User::where('id', '!=', 1)->first();
        Permission::create([
            'user_id' => $model->id,
            'perm_key' => 'memberLevel_read'
        ]);

        $response = $this->post('/operate/user/' . $model->id, [
            'name' => $model->name,
            'email' => 'test@test.com',
            'password' => Hash::make('1234567'),
        ]);

        $permission = Permission::where('perm_key', 'memberLevel_read')->where('user_id', $model->id)->first();
        $response->assertStatus(302);
        $this->assertNull($permission, '權限沒有被移除');
    }

    /**
     * 更新，驗證欄位
     */
    public function test_user_update_necessary(): void
    {
        $model = User::where('id', '!=', 1)->first();
        $response = $this->post('/operate/user/' . $model->id, ['name' => '', 'password' => '']);
        $response->assertStatus(302); // 確認導回
        $this->assertTrue(Session::has('errors')); //確認有送錯誤訊息給前端
    }

    /**
     * 刪除，驗證欄位
     */
    public function test_user_del(): void
    {
        $model = User::where('id', '!=', 1)->first();
        $response = $this->post('/operate/user/del', ['id_array' => [$model->id]]);
        $response->assertStatus(302);

        $this->assertModelMissing($model);
    }
}
