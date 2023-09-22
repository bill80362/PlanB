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
//    public $connection = 'database';

    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
//    public $delay = 3;

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
//        echo 123;

    }
}
