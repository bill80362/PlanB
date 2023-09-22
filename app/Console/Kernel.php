<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * 設定要執行的排程
     */
    protected function schedule(Schedule $schedule): void
    {
        //        $schedule->command('app:add-user')->everyMinute()->withoutOverlapping(60);
        $schedule->command('app:add-user')->everyMinute();

        //        $schedule->command('inspire')->everyMinute();
        //        $schedule->command('inspire')->hourlyAt(17);

        // 在每周一 13:00 执行...
        //        $schedule->call(function () {
        //            // ...
        //        })->mondays()->at('13:00');

        //使用cron
        //        $schedule->command('inspire')->cron('* * * * *');

        /**
         * 防止重複執行，執行記錄在Cache 可使用 schedule:clear cache 清除
         */
        // $schedule->command('emails:send')->withoutOverlapping();

        /**
         * 使用closures的方式
         */
        // $schedule->call(function () {
        //     DB::table('recent_users')->delete();
        // })->everySecond();

        //        $schedule->call(function () {
        //        })
        //            ->daily()
        //            ->at('13:00')
        //            ->before(function () {
        //                // 任务即将执行。。。
        //            })
        //            ->after(function () {
        //                // 任务已经执行。。。
        //            })
        //            ->onSuccess(function () {
        //                // 任务执行成功。。。
        //            })
        //            ->onFailure(function () {
        //                // 任务执行失败。。。
        //            })
        //        ;
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
