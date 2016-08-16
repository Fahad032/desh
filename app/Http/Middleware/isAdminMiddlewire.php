<?php

namespace App\Http\Middleware;

use Closure;

class isAdminMiddlewire
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

        if(!$role = $request->user()->is_allowed('Admin')){

            return redirect('/home');
        }

        return $next($request);
    }
}
