<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

        protected $guards = [];

    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }


    protected function redirectTo($request)
    {

        if (!$request->expectsJson()) {
            if (array_first($this->guards) === 'student') {
                return route('student.login');
            }elseif (array_first($this->guards) === 'teacher') {
                return route('teacher.login');
            }elseif (array_first($this->guards) === 'tutor') {
                return route('tutor.login');
            }elseif (array_first($this->guards) === 'manager') {
                return route('manager.login');
            }elseif (array_first($this->guards) === 'admin') {
                return route('admin.login');
           } /*  elseif (array_first($this->guards) === 'etablissemnt') {
                return route('etablissemnt.login');
            }*/
            return route('/');
        }

    }
}
