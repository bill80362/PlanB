<?php

namespace App\Listeners;

use App\Events\DemoQueueEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;


class DemoQueueListener implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(DemoQueueEvent $event): void
    {
//        sleep(10);
        //
        app('log')->info("delay9999988888");
    }
}
