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
        /**
         * @todo sms 串接               
         */
    }

    /**
     * Handle a job failure.
     */
    public function failed(object $event, Throwable $exception): void
    {
    }
}
