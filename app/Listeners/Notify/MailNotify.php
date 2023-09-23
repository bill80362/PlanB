<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\MailService;
use Exception;
use Illuminate\Support\Facades\Log;

class MailNotify
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected MailService $mailService
    ) {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        try {

            if (!($event->mailData && is_array($event->mailData) && count($event->mailData) > 0)) {
                throw new Exception("格式錯誤");
            }

            $this->mailService->send(
                $event->mailData['mailKey'],
                $event->mailData['values'],
                'sender_address@gmail.com',  // 需從configService取出設定
                $event->mailData['userMail']
            );
        } catch (Exception $e) {
            Log::channel('notify_error')->error($this::class . ": " . $e->getMessage());
        }
    }
}
