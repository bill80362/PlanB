<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Services\Notify\SMSService;

class SMSNotifyAsync implements ShouldQueue
{
    use InteractsWithQueue;
    public $connection = 'database'; //sync database
    public $queue = 'default';
    /**
     * Create the event listener.
     */
    public function __construct(
        protected SMSService $smsService
    ) {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if (!($event->smsData && is_array($event->smsData) && count($event->smsData) > 0)) {
            throw new Exception("格式錯誤");
        }

        /**
         * @todo sms 串接               
         */
        $this->smsService->send();
    }

    /**
     * Handle a job failure.
     */
    public function failed(object $event, Throwable $exception): void
    {
        Log::channel('notify_error')->error($this::class . " Async: " . $exception->getMessage());
    }
}
