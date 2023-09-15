<?php

namespace App\Http\Controllers\Operation;

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
        return view('operate/pages/login', ['name' => 'Bill']);
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

        auth('operate')->login($user);
        return redirect("/operate");
    }

    public function logout()
    {
        auth('operate')->logout();
        return redirect("/operate/login");
    }
}
