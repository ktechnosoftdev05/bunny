<?php

namespace App\Http\Middleware;

use Closure;

class CheckIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if(auth()->guard($guard)->user()->ip === $request->ip())
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('admin.device-verification');
        }

    }
}
