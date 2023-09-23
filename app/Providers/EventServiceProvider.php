<?php

namespace App\Providers;

use App\Events;
use App\Listeners;
use App\Listeners\Operate;
use Illuminate\Auth;
use Illuminate\Auth\Events\Registered;
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
        Auth\Events\Registered::class => [],
        Auth\Events\Login::class => [
            Operate\UserLoginListener::class,
        ],
        Events\Operate\UserLoginFailEvent::class => [
            Operate\UserLoginFailListener::class,
        ],
        Auth\Events\Logout::class => [],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            \SocialiteProviders\Google\GoogleExtendSocialite::class . '@handle',
            \SocialiteProviders\Facebook\FacebookExtendSocialite::class . '@handle',
            \SocialiteProviders\Line\LineExtendSocialite::class . '@handle',
        ],

        // 新訂單通知
        Events\Notify\NewOrderEvent::class => [
            // Listeners\Notify\SMSNotify::class,
            Listeners\Notify\MailNotify::class,
            Listeners\Notify\LineNotify::class,
        ],

        // 退款成功通知
        Events\Notify\RefundEvent::class => [
            Listeners\Notify\MailNotify::class,
            // Listeners\Notify\LineNotify::class,
            Listeners\Notify\SMSNotify::class,
        ],

        /** 排程事件監聽 START **/
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
        /** 排程事件監聽 END **/

        /**發送訊息通知事件*/
        \App\Events\Operate\UserEditEvent::class => [ //管理人資料修改
            \App\Listeners\Operate\UserEditListener::class, //掛載不同的通知
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
