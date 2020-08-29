<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard === 'admin')
        {
            if(Auth::guard($guard)->check())
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('admin.login');
            }
        }
    }
}

//if(Auth::guard($guard)->user()->ip === '123.45.654')
//{
//    return $next($request);
//}
//else
//{
//    return redirect()->route('admin.device-verification');
//}
