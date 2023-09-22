<?php

namespace App\Http\Controllers\Operation;

class IndexController extends \App\Http\Controllers\Controller
{
    public function dashboard()
    {
        return view('/operate/dashboard', ['name' => 'Bill']);
    }

    public function index()
    {
        return redirect('/operate/login');
    }
}
