<?php

namespace App\Http\Middleware;

use Closure;

class UserStatus
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

        if (auth()->check() && auth()->user()->status != "100"):
            return $next($request);
        else:
            return redirect('/logout');
        endif;

    }
}
