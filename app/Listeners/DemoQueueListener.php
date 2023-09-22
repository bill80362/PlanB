<?php

namespace App\Listeners;

use App\Events\DemoQueueEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoQueueListener implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(DemoQueueEvent $event): void
    {
        //
        app('log')->info('delay9999988888');
    }
}
