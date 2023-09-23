<?php

namespace App\Listeners\Operate;

use App\Events\Operate\UserEditEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class UserEditListener implements ShouldQueue
{
    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'database';//sync database
    public $queue = 'default';
    public $delay = 3;


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
        Log::channel('daily')->info($event->oUser->toJson());
    }
}
