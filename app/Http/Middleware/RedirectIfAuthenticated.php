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
        //this is ensuring that if we try to access "admin dashboard" , we are redirected to the home page of the user(if that user is logged in)
        // switch ($guard)
        // {
        //     case 'admin':
        //
        //         if(Auth::guard($guard)->check())
        //         {
        //         return redirect()->guest(route('admin.login'));
        //         }
        //         break;
        //
        //     default:
        //     if(Auth::guard($guard)->check())
        //     {
        //     return redirect()->guest(route('/home'));
        //     }
        //     break;
        //
        // }

        if (Auth::guard($guard)->check())
{


    foreach (Auth::guard('admin')->user()->role as $role) {
    if($role->name == 'editor')
    {
         return redirect('admin/editor');
    }
}


}
        return $next($request);
    }
}
