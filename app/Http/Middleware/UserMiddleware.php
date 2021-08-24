<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Closure;

class UserMiddleware
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
         //below code is use to ban email
        if(Auth::check() && Auth::user()->is_ban){
            $banned = Auth::user()->is_ban=="1";
            Auth::logout();
            if($banned=='1'){
                $message = "Your account has been Banned. Please contact administrator.";
            }
            return redirect()->route('login')
            ->with('status',$message)
            ->withErrors(['email'=>"Your account has been Banned. Please contact administrator."]);
        }
        return $next($request);
    }
}
