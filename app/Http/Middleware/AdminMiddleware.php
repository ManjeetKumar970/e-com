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
    public function handle(Request $request, Closure $next): Response
    {
        // Assuming 'role' column defines user role
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return $next($request);
        }

        // Redirect or abort if not admin
        return redirect('/')->with('error', 'You are not authorized to access this page.');
        // OR
        // abort(403, 'Unauthorized action.');
    
    }
}
