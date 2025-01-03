<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Jika user tidak login atau tidak memiliki role yang sesuai
        if (!$user || !in_array($user->id_role, $roles)) {
            // abort(403, 'Unauthorized access.');
            return redirect(route('login'));
        }


        return $next($request);
    }
}
