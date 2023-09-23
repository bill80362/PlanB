<?php

namespace App\Listeners\Operate;

use App\Events\Operate\UserEditEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserEditListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'database';//sync database
    public $queue = 'default';
//    public $delay = 3;
//    public $tries = 1;//錯誤後，重新嘗試次數


    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //


    }

    /**
     * Handle the event.
     */
    public function handle(UserEditEvent $event): void
    {
        Log::channel('daily')->info("AAA",$event->Data);
    }

    /**
     * Handle a job failure.
     */
    public function failed(UserEditEvent $event, Throwable $exception): void
    {
        Log::channel('daily')->error("全域Queue的Job失敗會觸發AAAAAAAA");
        //通知先使用LOG表達
//        Log::channel('daily')->info("在Listener拿到失敗了".$exception->getMessage());
    }
}
