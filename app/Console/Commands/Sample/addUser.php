<?php

namespace App\Console\Commands\Sample;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class addUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '隨機新增一名user，測試用';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        sleep(120);
        //
        \App\Models\User::create([
            'name' => 'admin'.rand(1,1000000),
            'email' => 'test'.rand(1,1000000).'@gmail.com',
            'password' => Hash::make('admin'),
            'status' => "Y",
        ]);

//        dd(123);
    }
}
