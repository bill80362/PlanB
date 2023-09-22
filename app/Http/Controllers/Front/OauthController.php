<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Member\Member_Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class OauthController extends Controller
{
    public function googleRedirect()
    {
        /**
         * 如果設定改為吃db的，就需使用以下的註解
         */
        // Config::set('services.google.client_id','xxx');
        // Config::set('services.google.client_secret','xxxx');
        // Config::set('services.google.redirect','xxxx');
        return Socialite::driver('google')->redirect();
    }

    public function googleLogin(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (InvalidStateException $e) {
            dd('發生錯誤請重新登入');
        }

        dd($user);
        // 判斷是否有帳號
        // 綁定等等

        /**
         * 如果已綁定過就直接使用auth做登入
         */
        // $memberData = Member_Data::find(1);
        // auth('web_front')->login($memberData);
        // return redirect('/');
    }

    public function lineRedirect()
    {
        return Socialite::driver('line')->redirect();
    }

    public function LineLogin(Request $request)
    {
        try {
            $user = Socialite::driver('line')->user();
        } catch (InvalidStateException $e) {
            dd('發生錯誤請重新登入');
        }
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookLogin(Request $request)
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (InvalidStateException $e) {
            dd('發生錯誤請重新登入');
        }
    }
}
