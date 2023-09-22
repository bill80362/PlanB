<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function homepage()
    {

        return view('front/pages/homepage/homepage', [

        ]);
    }
}
