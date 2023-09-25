<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ThirdParty\Main\AbcService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        protected Request $request,
        protected AbcService $abcService
    ) {
    }

    public function queryOrder()
    {
        // $user = auth('erp')->user();
        $id = $this->request->query('id', 1);
        $result = $this->abcService->getPostData($id);

        return [
            // 'userinfo' => $user,
            'msg' => 'test run...',
            'result' => $result,
        ];
    }
}
