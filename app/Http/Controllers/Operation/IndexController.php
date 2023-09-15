<?php

namespace App\Http\Controllers\Operation;

use Illuminate\Http\Request;

class IndexController extends \App\Http\Controllers\Controller
{
    public function dashboard(){
        return view('operate/dashboard', ['name' => 'Bill']);
    }

    public function index(){
        return redirect('/operate/dashboard');
    }
}
