<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function httpTest()
    {
        $response = Http::retry(3, 100)
            ->connectTimeout(60)
            // ->withToken('faketoken','Bearer')
            // ->withBasicAuth('username','password')
            // ->timeout(1000)
            ->withHeaders([
                'X-Example' => 'example'
            ])
            ->get('https://jsonplaceholder.typicode.com/todos/1', []);

        $json = $response->json();
        $status = $response->status();

        dd([
            'client error' => $response->clientError(), // 400 區間
            'server error' => $response->serverError(), // 500 區間
            'status' => $status,
            'json' => $json
        ]);

        // 預設為json
        // $response = Http::post('http://example.com/users', [
        //     'name' => 'Steve',
        //     'role' => 'Network Administrator',
        // ]);
        return view('front.index');
    }

    public function index()
    {

        return view('front.index');
    }

    public function changeLang(Request $request)
    {
        $locale = $request->query('lang', 'en');
        if (!in_array($locale, ['en', 'zh-tw'])) {
            $locale = 'zh-tw';
        }
        $request->session()->put("locale", $locale);
        return redirect($locale . '/');
    }
}
