<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('inspire')->everyMinute();
        $schedule->command('inspire')->hourlyAt(17);

        // 官方範例

        /**
         * 防止重複執行
         */
        // $schedule->command('emails:send')->withoutOverlapping();

        /**
         * 使用closures的方式
         */
        // $schedule->call(function () {
        //     DB::table('recent_users')->delete();
        // })->everySecond();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
