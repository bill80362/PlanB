<?php

namespace App\Listeners\Schedule;

use Illuminate\Support\Facades\Log;

class LogScheduledTaskStarting
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
        Log::channel('schedule_run')->info(json_encode($event));

    }
}
