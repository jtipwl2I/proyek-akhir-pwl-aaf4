<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class cekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() and Auth::user()->is_admin) {
            
            return $next($request);
        } else if(Auth::check()) {

            return redirect()->route('user.home');
        } else {

            return redirect()->route('login');
        }
    }
}
