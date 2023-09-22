<?php

namespace App\Tools\Logging;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Monolog\Handler\AbstractProcessingHandler;
use Exception;
use Monolog\LogRecord;
use Monolog\Level;
use App\Models\HttpLog;
use Illuminate\Http\Client\Response;

/**
 * 此為log擴充範例
 */
class MysqlHandler extends AbstractProcessingHandler
{

    public function __construct($level = Level::Debug, $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(LogRecord $record): void
    {
        $response = $record['context']['response'] ?? null;
        if ($response == null) {
            return;
        }
        if ($record['context']['response'] instanceof Response) {
            $json = $response->json();
            $status = $response->status();
            $eventBody = [
                'time' => Carbon::now()->format('Y-m-d H:i:s'),
                'level' => Level::fromValue($record['level']) ?: 'Information',
                'json' => $json,
                'status' => $status,
                'formatted' => $record['formatted']
            ];
        } else {
            echo "no";
        }
        // $eventBody = [
        //     'time' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'level' => Level::fromValue($record['level']) ?: 'Information',
        //     'message' => $record['message'],
        //     'context' => $record['context']['response'],
        //     'formatted' => $record['formatted']
        // ];
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
