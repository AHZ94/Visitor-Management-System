<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class admin
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
        $userID = Auth::id();
        $user = Auth::user();

        if($user->user_type == "admin"){
            return $next($request);
        }
        else{
            Auth::logout();
            return ('/');            
        }       
    }
}
