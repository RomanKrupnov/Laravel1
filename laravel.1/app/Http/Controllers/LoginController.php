<?php

namespace App\Http\Controllers;

use App\Adaptors\Adaptor;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginGit()
    {
        if(Auth::check()) {
            return redirect()->route('index');
        }
        return Socialite::with('github')->redirect();
    }

    public function responseGit(Adaptor $userAdaptor)
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
        $user = Socialite::driver('github')->user();
        $userInSystem = $userAdaptor->getUserBySocId($user, 'gitHub');
        Auth::login($userInSystem);
        return redirect()->route('index');
    }
    public function loginVK()
    {
        if(Auth::check()) {
            return redirect()->route('index');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(Adaptor $userAdaptor)
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
        $user = Socialite::driver('vkontakte')->user();
        $userInSystem = $userAdaptor->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('index');

    }

}
