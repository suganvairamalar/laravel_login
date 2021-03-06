<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


use Closure;

class AdminMiddleware
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
        //return $next($request);

        if(Auth::user()->role_as=='admin'){
             return $next($request);
        }
        else{
            return redirect('/home')->with('status','You are not allowed to access the Dashboard!');
        }
    }
}
