<?php

namespace App\Services\ThirdParty\Main;

use Illuminate\Support\Facades\Http;

/**
 * 此為範例class
 *
 * 規範：
 * 檔名以公司名稱命名
 * 放串接設定、寫入log方法
 *
 * Abc公司
 */
class AbcService
{
    public function __construct()
    {
    }

    public function getTodoData($id = 1)
    {
        $result = Http::log('abc_http', [
            'type' => 'todoData',
            'primary_key' => $id,
        ])->retry(2, 100)
            ->connectTimeout(60)
            ->timeout(1000)
            ->withHeaders([
                'X-Example' => 'example',
            ])
            ->get('https://jsonplaceholder.typicode.com/todos/' . $id, []);
        return $result->json();
    }

    public function getPostData($id)
    {
        $result = Http::log('abc_http', [
            'type' => 'postData',
            'primary_key' => $id,
        ])->retry(2, 100)
            ->connectTimeout(60)
            ->timeout(1000)
            ->withHeaders([
                'X-Example' => 'example',
            ])
            ->get('https://jsonplaceholder.typicode.com/posts/' . $id, []);

        return $result->json();
    }
}
