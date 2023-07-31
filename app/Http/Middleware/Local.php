<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Local
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
        //\App::setLocale(session('local'));
        //return $next($request);
        if(\Session::has('local')){
            \App::setlocale(\Session::get('local'));
        }
        return $next($request);
    }
}
