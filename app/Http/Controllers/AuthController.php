<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validation)) {
            $request->session()->regenerate();

            $user = Auth::user();
            // dd([
            //     'class' => get_class($user),
            //     'file' => (new \ReflectionClass($user))->getFileName(),
            //     'hasMethod_isAdmin' => method_exists($user, 'isAdmin'),
            // ]);
            // dd($user->isAdmin());

            // Redirect berdasarkan role
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->isGuru()) {
                return redirect()->route('guru.dashboard');
            } else {
                return redirect()->route('siswa.dashboard');
            }
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
