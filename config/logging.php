<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            //            'name' => 'LOG的主機名稱',
            'channels' => ['single'],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
            'replace_placeholders' => true,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
            'level' => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://' . env('PAPERTRAIL_URL') . ':' . env('PAPERTRAIL_PORT'),
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],
        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],
        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
            'facility' => LOG_USER,
            'replace_placeholders' => true,
        ],
        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],
        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],
        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],
        /****
         * Guard分類 START
         * access 紀錄所有 request response 透過middleware掛載
         * exceptions 紀錄有拋例外 透過 handler 觸發
         *******/
        'api_access' => [
            'driver' => 'daily',
            'path' => storage_path('logs/api/access.log'),
            'channels' => ['daily'],
        ],
        'api_exceptions' => [
            'driver' => 'daily',
            'path' => storage_path('logs/api/exceptions.log'),
            'channels' => ['daily'],
        ],
        'erp_access' => [
            'driver' => 'daily',
            'path' => storage_path('logs/erp/access.log'),
            'channels' => ['daily'],
        ],
        'erp_exceptions' => [
            'driver' => 'daily',
            'path' => storage_path('logs/erp/exceptions.log'),
            'channels' => ['daily'],
        ],
        'operate_access' => [
            'driver' => 'daily',
            'path' => storage_path('logs/operate/access.log'),
            'channels' => ['daily'],
        ],
        'operate_exceptions' => [
            'driver' => 'daily',
            'path' => storage_path('logs/operate/exceptions.log'),
            'channels' => ['daily'],
        ],
        'front_access' => [
            'driver' => 'daily',
            'path' => storage_path('logs/front/access.log'),
            'channels' => ['daily'],
        ],
        'front_exceptions' => [
            'driver' => 'daily',
            'path' => storage_path('logs/front/exceptions.log'),
            'channels' => ['daily'],
        ],
        'others_access' => [
            'driver' => 'daily',
            'path' => storage_path('logs/others/access.log'),
            'channels' => ['daily'],
        ],
        'others_exceptions' => [
            'driver' => 'daily',
            'path' => storage_path('logs/others/exceptions.log'),
            'channels' => ['daily'],
        ],
        /**** Guard分類 END *******/

        /**** 排程 START *******/
        'schedule_run' => [
            'driver' => 'daily',
            'path' => storage_path('logs/schedule/run.log'),
            'channels' => ['daily'],
        ],
        'schedule_error' => [
            'driver' => 'daily',
            'path' => storage_path('logs/schedule/error.log'),
            'channels' => ['daily'],
        ],
        /**** 排程 END *******/

        //
        'abc_http' => [
            'driver' => 'monolog',
            'handler' => App\Tools\Logging\MysqlHandler::class,
            'handler_with' => [
                'modal_class' => App\Models\Log\HttpLog::class,
            ],
        ],

    ],

];
