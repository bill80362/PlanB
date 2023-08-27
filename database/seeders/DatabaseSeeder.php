<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Member\Member_Data;
use Database\Factories\Member\Member_DataFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //目前數量
        Member_DataFactory::$counter = Member_Data::max("ID")+1;
        //製造
        \App\Models\Member\Member_Data::factory(10)->create();
    }
}
