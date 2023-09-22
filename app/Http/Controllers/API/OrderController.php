<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Response;

class OrderController extends Controller
{


    public function queryOrder(Request $request)
    {

        $response = Http::retry(3, 100)
            // ->connectTimeout(60)
            // ->withToken('faketoken','Bearer')
            // ->withBasicAuth('username','password')
            // ->timeout(1000)
            ->withHeaders([
                'X-Example' => 'example'
            ])
            ->get('https://jsonplaceholder.typicode.com/todos/1', []);

     

        // dd([
        //     'client error' => $response->clientError(), // 400 區間
        //     'server error' => $response->serverError(), // 500 區間
        //     'status' => $status,
        //     'json' => $json
        // ]);
        Log::channel('mysql')->info('test-test', [
            'response' => $response
        ]);
        // $user = auth('erp')->user();
        // $test = User::where('id', 55)->firstOrFail(); //錯誤測試
        return [
            // 'userinfo' => $user,
            'msg' => 'test run...'
        ];
    }
}
