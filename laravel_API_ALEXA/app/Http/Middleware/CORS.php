<?php

namespace App\Http\Middleware;

use Closure;
/* AUTOR: KEVIN VELASCO 
kvelascosr@gmail.com */
class CORS
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
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
        return $next($request);
    }
}
