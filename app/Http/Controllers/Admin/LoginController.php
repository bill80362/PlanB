<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginController extends \App\Http\Controllers\Controller
{
    public function __construct(
        protected Request $request,
    ) {
    }
    public function loginHTML()
    {
        return view('admin/login', ['name' => 'Bill']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'Account' => ['required', Rule::exists('users', 'name')],
            'Password' => ['required']
        ]);

        $user = User::where('name', $request->get('Account'))->first();
        if (!Hash::check($request->get('Password'), $user->password)) {
            return back()->withErrors([
                'errors' => ['帳號或密碼有誤，請重新確認輸入']
            ]);
            
        }

        auth('web')->login($user);
        // auth('web_front')->login($memberModel);
        return redirect("/oper/Member_Data");
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect("/oper/login");
    }
}
