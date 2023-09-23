<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\MailService;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class MailNotifyAsync implements ShouldQueue
{
    use InteractsWithQueue;
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
        $this->mailService->send(
            $event->mailData['mailKey'],
            $event->mailData,
            'sender_address@gmail.com',  // 需從configService取出設定
            $event->mailData['userMail']
        );
    }


    /**
     * Handle a job failure.
     */
    public function failed(object $event, Throwable $exception): void
    {
    }
}
