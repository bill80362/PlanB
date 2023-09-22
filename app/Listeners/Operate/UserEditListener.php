<?php

namespace App\Listeners\Operate;

use App\Events\Operate\UserEditEvent;
use Illuminate\Support\Facades\Log;

class UserEditListener
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
    public function handle(UserEditEvent $event): void
    {
        //通知先使用LOG表達
        Log::channel('daily')->info(json_encode($event));

    }
}
