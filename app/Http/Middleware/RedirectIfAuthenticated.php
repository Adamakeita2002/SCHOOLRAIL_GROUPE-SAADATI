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
      switch ($guard) {
        case 'user':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('user.dashboard');
          }
          break;
        case 'structure':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('structure.dashboard');
          }
          break;
        case 'personel':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('personel.dashboard');
          }
          break;
        case 'eleve':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('eleve.dashboard');
          }
          break;
        case 'admin':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('admin.dashboard');
          }
          break;
        case 'academie':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('academie.dashboard');
          }
          break;

        case 'etablissement':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('etablissement.dashboard');
          }
          break;

        default:
          if (Auth::guard($guard)->check()) {
              return redirect('/');
          }
          break;
      }



      return $next($request);




    }
}
