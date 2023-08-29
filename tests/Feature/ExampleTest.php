<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
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
    //驗證是否擋住名稱必填
    public function test_member_update_column_necessary(): void
    {
        $response = $this->post('/Member_Data/1',["Name"=>""]);
        $response->assertStatus(302);
    }
}
