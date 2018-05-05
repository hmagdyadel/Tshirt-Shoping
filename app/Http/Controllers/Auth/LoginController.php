<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('shop.index');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {

        $userSocial = Socialite::driver('facebook')->user();
        $finduser = User::where('email', $userSocial->email)->first();
        if ($finduser) {
            Auth::login($finduser);
            return 'done with old';
        } else {
            $user = new User();
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->save();
            Auth::login($user);
            return 'done';
        }

    }

    public function redirectToProvidergoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackgoogle()
    {

        $userSocial = Socialite::driver('google')->user();
        $finduser = User::where('email', $userSocial->email)->first();
        if ($finduser) {
            Auth::login($finduser);
            return 'done with old';
        } else {
            $user = new User();
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->save();
            Auth::login($user);
            return redirect()->back();
        }

    }
}
