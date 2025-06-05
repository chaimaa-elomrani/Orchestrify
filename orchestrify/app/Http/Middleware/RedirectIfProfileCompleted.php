<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfProfileCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle($request, Closure $next)
{
    if (!Auth::check()) {
        return redirect()->route('login'); // not authenticated
    }

    if (Auth::user()->chefProfile && Auth::user()->chefProfile->completed) {
        return redirect()->route('home')->with('error', 'You have already completed your profile.');
    }

    return $next($request);
}
}
