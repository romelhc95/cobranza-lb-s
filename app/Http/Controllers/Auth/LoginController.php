<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function login(Request $request){
        
        $remember = $request->filled('remember');
        
        if (Auth::attempt($request->only('document_number', 'password'), $remember)) {
            $request->session()->regenerate();

            if (auth()->user()->is_admin) {
                return redirect()->intended('/admin/home');
            } else {
                return redirect()->intended('/client/client');
            }

            
            
        }
        
        throw ValidationException::withMessages([
            'document_number' => __('auth.failed'),
            'password' => __('auth.password')
        ]);
    }

    public function logout(Request $request){
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/');

    }
}
