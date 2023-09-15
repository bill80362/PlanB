<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function queryOrder(Request $request)
    {
        $user = auth('erp')->user();

        return [
            'userinfo' => $user,
            'msg' => 'test run...'
        ];
    }
}
