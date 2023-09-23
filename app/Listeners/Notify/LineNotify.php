<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LineNotify
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // $this->lineNotifyService->send(
        //     $event->lineNotifyData,
        //     $uuid
        // );
    }
}
