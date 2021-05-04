<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if(auth()->check() && auth()->user()->role_id === 3){
            return $next($request);
        }

        if(auth()->check() && auth()->user()->role_id === 2){
            return redirect()->route('account');
        }

        if(auth()->check() && auth()->user()->role_id === 1){
            return redirect()->route('user.index');
        }

        return redirect('/');
    }
}
