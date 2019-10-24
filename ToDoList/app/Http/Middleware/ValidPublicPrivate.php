<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class ValidPublicPrivate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $routeName = $request->route()->getName();
        $routeArr = explode('.', $routeName);
        View::share('routeGroup', $routeArr[0]);
        if (isset($routeArr[1])) {
            View::share('routeLink', $routeArr[1]);
        } else {
            View::share('routeLink', null);
        }
        if (isset($routeArr[2])) {
            View::share('routeSubLink', $routeArr[2]);
        } else {
            View::share('routeSubLink', null);
        }
        return $next($request);
    }
}
