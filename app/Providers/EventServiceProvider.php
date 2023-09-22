<?php

namespace App\Providers;

use App\Events\DemoQueueEvent;
use App\Events\MemberDataSavingEvent;
use App\Events\PodcastProcessed;
use App\Listeners\DemoQueueListener;
use App\Listeners\MemberDataSaving;
use App\Listeners\SendPodcastNotification;
use App\Listeners\UserLoginListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Auth\Events\Login::class => [
            UserLoginListener::class
        ],
        Auth\Events\Logout::class => [],
//        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
//            \SocialiteProviders\Google\GoogleExtendSocialite::class . '@handle',
//            \SocialiteProviders\Facebook\FacebookExtendSocialite::class . '@handle',
//            \SocialiteProviders\Line\LineExtendSocialite::class . '@handle',
//        ],
        //Model監聽事件
//        MemberDataSavingEvent::class => [
//            MemberDataSaving::class,
//        ],
        //
//        DemoQueueEvent::class => [
//            DemoQueueListener::class,
//        ]
        //排程事件監聽
        'Illuminate\Console\Events\ScheduledTaskStarting' => [
            'App\Listeners\Schedule\LogScheduledTaskStarting',
        ],
        'Illuminate\Console\Events\ScheduledTaskFinished' => [
            'App\Listeners\Schedule\LogScheduledTaskFinished',
        ],
//        'Illuminate\Console\Events\ScheduledBackgroundTaskFinished' => [
//            'App\Listeners\LogScheduledBackgroundTaskFinished',
//        ],
//        'Illuminate\Console\Events\ScheduledTaskSkipped' => [
//            'App\Listeners\LogScheduledTaskSkipped',
//        ],
        'Illuminate\Console\Events\ScheduledTaskFailed' => [
            'App\Listeners\Schedule\LogScheduledTaskFailed',
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //啟用監聽
//        Event::listen(
//            PodcastProcessed::class,
//            [SendPodcastNotification::class, 'handle']
//        );
        //        //啟用監聽
        //        Event::listen(function (PodcastProcessed $event) {
        //
        //        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
