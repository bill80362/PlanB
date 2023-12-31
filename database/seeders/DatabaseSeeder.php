<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CountryAndShippingFee\Language;
use App\Services\Operate\PermissionService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User\ListColumnSetting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(PermissionService $permissionService): void
    {
        \App\Models\User::create([
            'id' => '1',
            'name' => 'superuser',
            'email' => 'superuser@test.com',
            'password' => Hash::make('superuser'),
            'lv' => '1',
            'status' => 'Y',
        ]);

        \App\Models\User::create([
            'id' => '2',
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'lv' => '2',
            'status' => 'Y',
        ]);

        $perms = $permissionService->getPermissions();
        foreach ($perms as $perm) {
            \App\Models\Permission\Permission::create([
                'user_id' => '1',
                'perm_key' => $perm['key'],
            ]);
        }

        foreach ($perms as $perm) {
            \App\Models\Permission\Permission::create([
                'user_id' => '2',
                'perm_key' => $perm['key'],
            ]);
        }


        // PageContent::firstOrCreate([
        //     'key' => 'privacyStatement',
        // ], [
        //     'lang_type' => '1',
        //     'page_name' => '隱私權聲明',
        // ]);

        // Permission::create([
        //     'user_id' => 1,
        //     'perm_key' => 'memberLevel.read'
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
