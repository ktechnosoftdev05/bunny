<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectAdminIfAuthenticated
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
                return redirect()->route('admin.dashboard');
            }
            else
            {
                return $next($request);
            }
        }
    }
}
