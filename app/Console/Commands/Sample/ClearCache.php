<?php

namespace App\Console\Commands\Sample;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '清除各式快取';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call("view:clear");
        Artisan::call("route:clear");
        Artisan::call("cache:clear");
        Artisan::call("config:clear");

        $result = Process::run('whoami');
        $this->info($result->output());
    }
}
