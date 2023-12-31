<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\Notify\LineNotifyService;
use Illuminate\Support\Facades\Validator;

class LineNotify
{
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
        try {
            $validator = Validator::make((array)$event, [
                'lineNotifyData.message' => ['string', 'required'],
            ]);

            if ($validator->fails()) {
                throw new Exception("格式錯誤");
            }

            /**
             * @todo line notify 串接               
             */
            $this->lineNotifyService->send();
        } catch (Exception $e) {
            Log::channel('notify_error')->error($this::class . ": " . $e->getMessage());
        }
    }
}
