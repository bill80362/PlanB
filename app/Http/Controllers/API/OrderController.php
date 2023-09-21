<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{


    public function queryOrder(Request $request)
    {
        // $user = auth('erp')->user();
        // $test = User::where('id', 55)->firstOrFail(); //錯誤測試
        return [
            // 'userinfo' => $user,
            'msg' => 'test run...'
        ];
    }
}
