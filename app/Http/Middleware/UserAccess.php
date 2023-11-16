<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class UserAccess
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
        $currentRoute = \Route::currentRouteName();
        $isSuperAdmin = (Auth::user()->role_id == 0) ? true : false;
        $permissions = \Session::get('permissions');

        $notRequirePermissions = ['dashboard', 'live-dashboard', 'edit-user', 'edit-password-user', 'update-user', 'update-password-user','print-parking'];
        if (in_array($currentRoute, $notRequirePermissions)) {
            return $next($request);
        }
        
        if (!$isSuperAdmin AND !in_array($currentRoute, $permissions)) {
            return redirect('/not-found');
        }
        return $next($request);
    }
}
