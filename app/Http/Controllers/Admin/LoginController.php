<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class LoginController extends \App\Http\Controllers\Controller
{
    public function __construct(
        protected Request $request,
    ){}
    public function loginHTML(){
        return view('admin/login', ['name' => 'Bill']);
    }
    public function login(){
        $this->request->session()->put('adminLogin', [
            "ID" => 1,
            "Name" => "測試用",
            "Role" => "Root",
        ]);
        //
        return redirect("/Member_Data");
    }
    public function logout(){
        $this->request->session()->flush();
        //
        return redirect("/");
    }
}
