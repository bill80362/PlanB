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
        // $user = auth('erp')->user();
        $response = Http::log('mysql', [
            'type' => 'login',
            'type2' => 'login',
            'primary_key' => 'test-user-id'
        ])->retry(1, 100)
            // ->connectTimeout(60)
            // ->withToken('faketoken','Bearer')
            // ->withBasicAuth('username','password')
            // ->timeout(1000)
            ->withHeaders([
                'X-Example' => 'example'
            ])
            ->get('https://jsonplaceholder.typicode.com/todos/1', []);
        return [
            // 'userinfo' => $user,
            'msg' => 'test run...'
        ];
    }
}
