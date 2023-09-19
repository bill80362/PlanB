<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomepageController extends Controller
{
    public function index(){
        return "我是首頁";
    }
    public function about(){
        return "關於我們";
    }
}
