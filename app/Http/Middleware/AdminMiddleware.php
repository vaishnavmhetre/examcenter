<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;

class AdminMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @function groups() \App\Group
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::check())
            if(\Auth::user()->groups()->whereIsAdmin(true)->first() != null)
                return $next($request);
            else
                throw new AuthenticationException('NotAdministratorBelonging');
        else
            throw new AuthenticationException();
    }
}
