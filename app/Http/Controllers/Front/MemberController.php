<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member\Member_Data;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class MemberController extends Controller
{


    public function index()
    {
        return view('front.member');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Cellphone' => ['required', Rule::exists('Member_Data', 'Cellphone')],
            'Login_Password' => ['required']
        ]);

        $member = Member_Data::where('Cellphone', $request->get('Cellphone'))->first();
        if (!Hash::check($request->get('Login_Password'), $member->Login_Password)) {
            return back()->withErrors([
                'errors' => ['帳號或密碼有誤，請重新確認輸入']
            ]);
        }
        
        auth('web_front')->login($member);
        return redirect("/member");
    }

    public function logout()
    {
        auth('web_front')->logout();
        return redirect("/");
    }
}
