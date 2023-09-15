<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class IndexController extends \App\Http\Controllers\Controller
{
    public function indexHTML(){
        return view('operate/index', ['name' => 'Bill']);
    }

    public function index(){
        return redirect('/operate/dashboard');
    }
}
