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
use Illuminate\Database\Eloquent\Model;


/**
 * 此為log擴充範例
 */
class MysqlHandler extends AbstractProcessingHandler
{

    private $modalClass;
    public function __construct($modal_class, $level = Level::Debug, $bubble = true)
    {
        $this->modalClass = $modal_class;
        parent::__construct($level, $bubble);
    }

    protected function write(LogRecord $record): void
    {
        try {
            $model = new $this->modalClass();
            $data = $record->toArray();
            // dd($data['context']);
            if ($model instanceof Model) {

                $statusCode = $data['context']['statusCode'];
                $isSuccess = in_array($statusCode, [200, 201]);
                $input = [
                    'type' => $data['context']['context']['type'] ?? '',
                    'primary_key' => $data['context']['context']['primary_key'] ?? '',
                    'status' => '', //串接成功或失敗
                    'status_code' => $statusCode,
                    'connect_time' => $data['context']['sec'],
                    'proccess_time' => '',
                    'url' =>  $data['context']['uri'],
                    'method' => $data['context']['method'],
                    'request' =>  $data['context']['request'] ?: json_decode($data['context']['request']),
                    'response' =>  $data['context']['response'] ?: json_decode($data['context']['response']),
                ];
                $model->create($input);
            } else {
                echo "log error";
            }
        } catch (Exception $exception) {
            dd('error: ' . $exception->getMessage());
            return;
        }
    }
}
