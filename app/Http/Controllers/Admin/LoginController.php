<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class LoginController extends \App\Http\Controllers\Controller
{
    public function loginHTML(){
        return view('admin/login', ['name' => 'Bill']);
    }
    public function login(){
        var_dump("AAA");

    }
}
