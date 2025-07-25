<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuruMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Jika admin, izinkan akses
        if ($user->role === User::ROLE_GURU) {
            return $next($request);
        }

        // Jika bukan admin, tolak akses tanpa redirect berulang
        return response()->view('errors.403', ['message' => 'Akses ditolak. Hanya guru yang diizinkan'], 403);
        return $next($request);

        // return redirect('/')->with('error', 'Akses ditolak! Hanya untuk guru.');
    }
}
