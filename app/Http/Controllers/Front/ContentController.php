<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function about()
    {
        return view('front/pages/content/about', [

        ]);
    }
}
