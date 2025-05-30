<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $data = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->is_admin) {
                return redirect()->route('dashboard');
            }
            return redirect()->route('student');
        } else {
            return redirect()->back()->with('failed', 'Email atau Password anda salah.');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
