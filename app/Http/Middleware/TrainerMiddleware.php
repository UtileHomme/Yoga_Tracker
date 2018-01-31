<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class TrainerMiddleware
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
        foreach(Auth::guard('admin')->user()->role as $role)
        {
            // dd(Auth::user()->role);
            //if the role is Trainee , proceed with the requested page , else
            if($role->name == 'Trainer')
            {
                        return $next($request);
            }

        }
        return redirect('');

    }
}
