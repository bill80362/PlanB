<?php

namespace App\Services\Notify;

use Exception;
use Illuminate\Support\Facades\Http;

/**
 * 串接line notify 發送
 */
class LineNotifyService
{
    private $apiUrl = "https://notify-api.line.me/api/notify";
    public function __construct()
    {
    }


    public function send($message = "", $token = '')
    {
        if ($message == '' || $token == '') {
            throw new Exception("message 和 token 不得為空。");
            return;
        }
        $response = Http::asForm()->withToken($token)
            ->post($this->apiUrl, [
                'message' => $message
            ])
            ->json();

        return $response;
    }
}
