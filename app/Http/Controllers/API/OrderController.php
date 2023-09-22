<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ThirdParty\Main\AbcService;

class OrderController extends Controller
{

    public function __construct(
        protected Request $request,
        protected AbcService $abcService
    ) {
    }

    public function queryOrder(Request $request)
    {
        // $user = auth('erp')->user();
        $id = $this->request->query('id', 1);
        $result = $this->abcService->getPostData($id);

        return [
            // 'userinfo' => $user,
            'msg' => 'test run...',
            'result' => $result->json()
        ];
    }
}
