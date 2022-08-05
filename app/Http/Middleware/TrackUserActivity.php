<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackUserActivity
{
   
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) {
            return $next($request);
        }
        if (!$request->user()->last_activity || $request->user()->last_activity < now()->subMinutes(5)) {
            $request->user()->last_activity = now();
            session('last_activity', now());
        }
        
        return $next($request);
    }
}
