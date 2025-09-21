<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TenanMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'tenant') {
            return $next($request);
        }

        return redirect('/login')->withErrors(['login' => 'Access denied.']);
    }
}
