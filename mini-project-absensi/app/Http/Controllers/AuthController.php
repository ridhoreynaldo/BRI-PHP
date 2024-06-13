<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;//tambahan
use App\Models\Role;//tambahan

class AuthController extends Controller
{

    //tambahan
    public function login() {
        return view('auth.login');
    }
    public function dologin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role_id === 1) {
                return redirect()->intended('/dashboard');
            } else if (auth()->user()->role_id === 2) {
                return redirect()->intended('/dashboard');
            } else if (auth()->user()->role_id === 3) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/dashboard');
            } 
        }
        return back()->with('error', 'email atau password salah');
    }
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
