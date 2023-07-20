<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Userテーブルからユーザ情報を検索
        $user = User::where('email', $googleUser->email)->first();

        // ユーザ情報がなければ新規作成
        if ($user === null) {
            $user = User::create([
                'google_id' => $googleUser->getId(),
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'email_verified_at' => now(),
            ]);
        }
        
        Auth::login($user, true);
        return redirect('/index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
