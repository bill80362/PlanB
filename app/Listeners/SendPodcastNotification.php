<?php

namespace App\Listeners;

use App\Events\PodcastProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPodcastNotification implements ShouldQueue
{
    //    use InteractsWithQueue;

    //    public $afterCommit = true;

    /**
     * Handle the event.
     */
    public function handle(PodcastProcessed $event): void
    {
        //
        //        var_dump($event->getModel());
    }

    public function subscribe(PodcastProcessed $events): void
    {
        //        app('log')->info("subscribe");
        
    }
}
