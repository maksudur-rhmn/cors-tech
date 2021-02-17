<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'student')
        {
            return redirect('/student');
        }
        if(Auth::user()->role == 'coach')
        {
            return redirect('/trainer');
        }
        return $next($request);
    }
}
