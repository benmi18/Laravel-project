<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Manager
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
        if (Auth::user()->role != 'owner' && Auth::user()->role != 'manager') {
            return redirect()->back();
        }else{
            return $next($request);
        }
    }
}
