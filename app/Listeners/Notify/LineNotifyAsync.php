<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Notify\LineNotifyService;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class LineNotifyAsync implements ShouldQueue
{
    use InteractsWithQueue;
    public $connection = 'database'; //sync database
    public $queue = 'default';
    /**
     * Create the event listener.
     */
    public function __construct(
        protected LineNotifyService $lineNotifyService
    ) {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if (!($event->lineNotifyData && is_array($event->lineNotifyData) && count($event->lineNotifyData) > 0)) {
            throw new Exception("格式錯誤");
        }
        
        /**
         * @todo line notify 串接               
         */
        $this->lineNotifyService->send();
    }


    /**
     * Handle a job failure.
     */
    public function failed(object $event, Throwable $exception): void
    {
        Log::channel('notify_error')->error($this::class . " Async: " . $exception->getMessage());
    }
}
