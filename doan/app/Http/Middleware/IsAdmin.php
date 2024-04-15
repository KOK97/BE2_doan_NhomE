<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    const ROLE_ADMIN = 'admin';
    
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->role === self::ROLE_ADMIN) {
                return $next($request);
            } else {
                abort(403, 'Access denied.');
            }
        }
        return redirect()->route('auth.login');
    }
}
