<?php

namespace App\Console\Commands\Sample;

use Illuminate\Console\Command;
use App\Events\Notify\NewOrderEvent;

class EchoABC extends Command
{
    /**
     * 啟動範本： php artisan app:echoABC
     *
     * @var string
     */
    protected $signature = 'app:echoABC';

    /**
     * 使用 php artisan list 可以看到所有命令還有說明。
     *
     * @var string
     */
    protected $description = '感覺這個適合拿來測試外部伺服器，例如加密伺服器是否正常、郵件伺服器是否正常，也可以拿來做初始化動作';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        echo 'ABC go!go!go!';

        NewOrderEvent::dispatch([
            'order_num' => '12345',
            'price' => 999,
            'mail' => 'bcs@gmail.com'
        ]);
    }
}
