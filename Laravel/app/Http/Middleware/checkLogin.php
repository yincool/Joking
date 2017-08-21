<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class checkLogin
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
        $usernumber = Cookie::get('usernumber');
        $password = Cookie::get('password');
        if(isset($usernumber) && isset($password)){
            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
