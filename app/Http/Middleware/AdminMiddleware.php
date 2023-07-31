<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        //return $next($request);
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->role_id != 0)
                return $next($request);
            else
                return redirect()->route('home');
        }
        else
        {
            return redirect()->route('home');
        }    
    }
}
