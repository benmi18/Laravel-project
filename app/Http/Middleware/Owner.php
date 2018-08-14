<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'owner') {
            return $next($request);
        }else {
            return redirect('/');
        }
    }
}