<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authentication(Request $request){
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validation)) {
            $request->session()->regenerate();
            
            $message = [
                'message' => 'Berhasil Masuk, Selamat Datang Di Beranda!',
                'type-message' => 'info',
            ];

            return redirect()->route('dashboard')->with($message);
        }

        $message = [
            'message' => 'Email atau Password salah!',
            'type-message' => 'error',
        ];

        return redirect()->route('login')->with($message);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
