<?php

namespace Tests\Feature\Operate;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\Operate\PermissionService;
// test command: php artisan test --filter=PermTest

/**
 * 測試service範例
 */
class PermTest extends TestCase
{
    /**
     * 取得權限群組(多層)，ui使用
     */
    public function test_perm_list(): void
    {
        $permService = app(PermissionService::class);
        $list = $permService->getGroupItemPermission();
        // 確認可執行
        $this->assertTrue(count($list) > 0);
        // 確認格式
        $this->assertTrue(array_key_exists('permissions', $list[0]));
    }


    /**
     * 取得權限陣列(一層)，後端建立gate使用
     */
    public function test_perm_actions(): void
    {
        $permService = app(PermissionService::class);
        $list = $permService->getPermissions();
        // 確認可執行
        $this->assertTrue(count($list) > 0);
        // 確認格式
        $this->assertTrue(array_key_exists('label', $list[0])); // 名稱        
        $this->assertTrue(array_key_exists('key', $list[0])); // key值
    }
}
