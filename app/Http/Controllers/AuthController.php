<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register() {}

    public function handleRegister() {}

    public function login() {
        return view('auth.login');
    }

    public function handleLogin(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            if(Auth::user()->role === 'admin') {
                return redirect('/admin/user');
            }
            return redirect('/homepage');
        }

        return back()->withErrors([
            'login_error' => 'Username atau password salah!',
        ])->withInput();
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
