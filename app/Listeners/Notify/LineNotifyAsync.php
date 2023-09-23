<?php

namespace App\Listeners\Notify;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Notify\LineNotifyService;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class LineNotifyAsync implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct(
        protected LineNotifyService $lineNotifyService
    )
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        /**
         * @todo line notify 串接               
         */
    }


    /**
     * Handle a job failure.
     */
    public function failed(object $event, Throwable $exception): void
    {
    }
}
