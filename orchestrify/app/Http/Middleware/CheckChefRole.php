<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckChefRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $user = Auth::user();
        
        // Check if user has chef role
        if ($user->role !== 'chef') {
            // If it's an AJAX request, return JSON response
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'Access denied. Chef privileges required.',
                    'redirect' => route('musician.dashboard')
                ], 403);
            }
            
            // For regular requests, redirect with error message
            return redirect()->route('musician.dashboard')
                           ->with('error', 'Access denied. You do not have chef privileges.');
        }

        return $next($request);
    }
}
