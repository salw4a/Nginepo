<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        $guards = ['pengguna', 'pemilik'];

        foreach ($guards as $guard) {
            $user = Auth::guard($guard)->user();
            if ($user && $user->role && $user->role->nama_role === $role) {
                Auth::shouldUse($guard);
                return $next($request);
            }
        }

        return abort(403);
    }
}
