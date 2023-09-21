<?php

namespace App\Tools\Logging;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Monolog\Handler\AbstractProcessingHandler;
use Exception;
use Monolog\LogRecord;
use Monolog\Level;

/**
 * 此為log擴充範例
 */
class MysqlHandler extends AbstractProcessingHandler
{
    protected $value1;

    public function __construct(string $value1, $level = Level::Debug, $bubble = true)
    {
        $this->value1 = $value1;


        parent::__construct($level, $bubble);
    }

    protected function write(LogRecord $record): void
    {
        $eventBody = [
            'time' => Carbon::now()->format('Y-m-d H:i:s'),
            'level' => Level::fromValue($record['level']) ?: 'Information',
            'message' => $record['message'],
            'context' => $record['context'],
            'formatted' => $record['formatted'],
            'value1' => $this->value1
        ];
        // $eventBody = $record->toArray();

        try {
            // $this->client->post($url, [
            //     "body" => json_encode($eventBody),
            //     "headers" => $headers
            // ]);
            dd($eventBody);
        } catch (Exception $exception) {
            return;
        }
    }
}
