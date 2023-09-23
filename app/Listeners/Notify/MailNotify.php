<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\MailService;


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
        $this->mailService->send(
            $event->mailData['mailKey'],
            $event->mailData,
            'sender_address@gmail.com',
            $event->mailData['userMail']
        );
    }
}
