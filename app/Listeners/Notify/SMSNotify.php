<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\Notify\SMSService;
use Illuminate\Support\Facades\Validator;

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
            // $validator = Validator::make((array)$event, [
            // ]);

            // if ($validator->fails()) {
            //     throw new Exception("格式錯誤");
            // }

            /**
             * @todo sms 串接               
             */
            $this->smsService->send();
        } catch (Exception $e) {
            Log::channel('notify_error')->error($this::class . ": " . $e->getMessage());
        }
    }
}
