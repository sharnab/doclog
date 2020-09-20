<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if(Auth::user()->sys_group_id==6)
            {
                return redirect()->route('customer_dashboard');
            }elseif(Auth::user()->sys_group_id==7)
            {
                return redirect()->route('corporate_dashboard');
            }else{
                return redirect()->route('admin_dashboard');
            }

        }

        return $next($request);
    }
}
