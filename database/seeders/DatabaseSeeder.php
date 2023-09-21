<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Member\Member_Data;
use App\Models\Permission\Permission;
use Database\Factories\Member\Member_DataFactory;
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
            'name' => 'admin',
            'email' => 'test@gmail.com',
            'password' => Hash::make('admin'),
            'status' => "Y",
        ]);

        \App\Models\Permission\Permission::create([
            'user_id' => '1',
            'perm_key' => 'user_read',
        ]);
        \App\Models\Permission\Permission::create([
            'user_id' => '1',
            'perm_key' => 'user_update',
        ]);

        // Permission::create([
        //     'user_id' => 1,
        //     'perm_key' => 'memberLevel.read'
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //目前數量
//        Member_DataFactory::$counter = Member_Data::max("ID") + 1;
        //製造
//        \App\Models\Member\Member_Data::factory(10)->create();
    }
}
