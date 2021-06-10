<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomLogin
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
        if(!auth()->check()) {
            dd("Anda belum masuk");
        } else {
            dd('Anda sudah masuk');
        }

        return $next($request); // untuk meneruskan header request ke klien apabila nggak ada kondisi yang terkait
    }
}
