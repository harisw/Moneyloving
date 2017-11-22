<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        if(is_null(session('id')))
        {
            return redirect('login')->with('status', 'Anda harus login terlebih dahulu!!!');
        }
        
        return $next($request);
    }
}
