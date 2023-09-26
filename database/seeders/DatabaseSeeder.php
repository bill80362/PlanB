<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CompanyManage\PageContent;
use App\Models\Permission\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
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

        \App\Models\Permission\Permission::create([
            'user_id' => '1',
            'perm_key' => 'user_read',
        ]);
        \App\Models\Permission\Permission::create([
            'user_id' => '1',
            'perm_key' => 'user_update',
        ]);

        \App\Models\Permission\Permission::create([
            'user_id' => '1',
            'perm_key' => 'user_delete',
        ]);

        \App\Models\Permission\Permission::create([
            'user_id' => '2',
            'perm_key' => 'user_read',
        ]);
        \App\Models\Permission\Permission::create([
            'user_id' => '2',
            'perm_key' => 'user_update',
        ]);

        \App\Models\Permission\Permission::create([
            'user_id' => '2',
            'perm_key' => 'user_delete',
        ]);

        \App\Models\Permission\Permission::create([
            'user_id' => '2',
            'perm_key' => 'mailOrder.newOrder',
        ]);

        // \App\Models\Permission\Permission::create([
        //     'user_id' => '1',
        //     'perm_key' => 'mailOrder.newOrder',
        // ]);

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
