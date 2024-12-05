<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        dd(Auth::check());
        if (!Auth::check()) {
            // Jika user belum login, redirect ke halaman login
            return redirect()->route('login');
        }

        return $next($request);
    }
}

