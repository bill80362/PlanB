<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\Notify\SMSService;

class SMSNotify
{
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
        try {
            if (!($event->smsData && is_array($event->smsData) && count($event->smsData) > 0)) {
                throw new Exception("格式錯誤");
            }

            /**
             * @todo sms 串接               
             */
            $this->smsService->send();
        } catch (Exception $e) {
            Log::channel('notify_error')->error($this::class . ": " . $e->getMessage());
        }
    }
}