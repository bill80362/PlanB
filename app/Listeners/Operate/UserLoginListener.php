<?php

namespace App\Listeners\Operate;

use Illuminate\Support\Facades\Log;

class UserLoginListener
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
        Log::info($event->user->name . " 登入成功！");
    }

    public function failed()
    {
    }
}
