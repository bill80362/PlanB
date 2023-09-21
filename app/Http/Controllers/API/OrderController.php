<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{


    public function queryOrder(Request $request)
    {

        Log::channel('mysql')->info('test-test',[
            'type' => 'http'
        ]);
        // $user = auth('erp')->user();
        // $test = User::where('id', 55)->firstOrFail(); //錯誤測試
        return [
            // 'userinfo' => $user,
            'msg' => 'test run...'
        ];
    }
}
