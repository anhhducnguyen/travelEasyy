<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has an 'admin' role
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return $next($request);
            } elseif (Auth::user()->role === 'user') {
                return redirect('/')->with('error', 'You do not have access to this page');
            }
        }
        // Redirect to admin login page if not authenticated or not admin
        return redirect('/login');
    }
}
