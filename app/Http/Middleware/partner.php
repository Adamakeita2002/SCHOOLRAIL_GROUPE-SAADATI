<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class partner
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

        if(auth()->user()->partner == 1){

            return $next($request);

        }

        return redirect('/partner/login')->with('error',"You don't have admin access.");

    }
}
