<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Notify\MailService;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Support\Facades\Validator;

class MailNotifyAsync implements ShouldQueue
{
    use InteractsWithQueue;
    public $connection = 'database'; //sync database
    public $queue = 'default';
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
        $validator = Validator::make((array)$event, [
            'mailData.mailKey' => ['string', 'required'],
            'mailData.values' => ['array'],
            'mailData.fromMail' => ['mail', 'required'],
            'mailData.userMail' => ['mail', 'required'],
        ]);

        if ($validator->fails()) {
            throw new Exception("格式錯誤");
        }
        // $this->mailService->send(
        //     $event->mailData['mailKey'],
        //     $event->mailData,
        //     'sender_address@gmail.com',  // 需從configService取出設定
        //     $event->mailData['userMail']
        // );
    }


    /**
     * Handle a job failure.
     */
    public function failed(object $event, Throwable $exception): void
    {
        Log::channel('notify_error')->error($this::class . " Async: " . $exception->getMessage());
    }
}
