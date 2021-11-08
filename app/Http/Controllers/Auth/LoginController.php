<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use App\Providers\RouteServiceProvider;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

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

    public function logout(){
        Auth::logout();
        return redirect('login')->withCookie(cookie('forward_session', '', -1));
    }

    public function root(){
        return view('auth.login');
    }

    public function rootFunction(){
        if (auth()->user()->is_admin){
            return redirect()->route('home');
        }else{
            return redirect()->route('client.index');
        }
    }

    public function homeFunction(){
        if (auth()->user()->is_admin){
            return redirect()->route('home');
        }else{
            return redirect()->route('client.index');
        }
    }

    public function redirectPath()
    {
        //dd(auth()->user()->is_admin === 0);
        if (auth()->user()->is_admin === 0) {
            return 'client/client';
        }

        return 'admin/home';
    }
}
