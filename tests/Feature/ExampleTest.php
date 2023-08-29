<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Member\Member_Data;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * 列表頁
     */
    public function test_member_data_list(): void
    {
        $response = $this->get('/Member_Data');
        $response->assertStatus(200);
    }
    /**
     * 更新頁
     */
    public function test_member_data_update_html(): void
    {
        $model = Member_Data::all()[0];
        $response = $this->get('/Member_Data/'.$model->ID);
        $response->assertStatus(200);
    }
    /**
     * 更新
     */
    public function test_member_data_update(): void
    {
        $model = Member_Data::all()[0];
        $response = $this->post('/Member_Data/'.$model->ID,$model->toArray());
        $response->assertStatus(200);
    }
    /**
     * 更新，驗證欄位
     */
    public function test_member_data_update_necessary(): void
    {
        $model = Member_Data::all()[0];
        $response = $this->post('/Member_Data/'.$model->ID,["Name"=>""]);
        $response->assertStatus(302);
    }
    /**
     * 刪除，驗證欄位
     */
    public function test_member_data_del(): void
    {
        $model = Member_Data::all()[1];
        $response = $this->post('/Member_Data/del',["ID"=>"$model->ID"]);
        $response->assertStatus(200);

        $this->assertModelMissing($model);
    }
}
