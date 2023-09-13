<?php

namespace App\Listeners;

use App\Events\MemberDataSavingEvent;
use App\Events\PodcastProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MemberDataSaving
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\MemberDataSavingEvent $event
     * @return mixed
     */
    public function handle(MemberDataSavingEvent $event)
    {
        //
        echo "我是 MemberDataSaving";
//        app('log')->info($event->oMember_Data);
//        echo 123;
    }
}
