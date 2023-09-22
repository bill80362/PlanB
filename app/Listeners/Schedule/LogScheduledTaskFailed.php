<?php

namespace App\Listeners\Schedule;

use Illuminate\Support\Facades\Log;

class LogScheduledTaskFailed
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
        //
        Log::channel('schedule_error')->info(json_encode($event));
    }
}
