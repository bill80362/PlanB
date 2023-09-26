<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Notify\MailService;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

            $validator = Validator::make((array)$event, [
                'mailData.mailKey' => ['string', 'required'],
                'mailData.values' => ['array'],
                'mailData.fromMail' => ['email', 'required'],
                'mailData.userMail' => ['email', 'required'],
            ]);

            if ($validator->fails()) {
                throw new Exception("格式錯誤");
            }

            $this->mailService->send(
                $event->mailData['mailKey'],
                $event->mailData['values'],
                $event->mailData['fromMail'],  // 需從configService取出設定
                $event->mailData['userMail']
            );
        } catch (Exception $e) {
            Log::channel('notify_error')->error($this::class . ": " . $e->getMessage());
        }
    }
}
