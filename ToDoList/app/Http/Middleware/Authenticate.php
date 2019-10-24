<?php

namespace App\Http\Middleware;

use App\Http\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('pubflic.login');
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param array $guards
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function authenticate($request, array $guards)
    {

        $token = preg_replace("/^Bearer\s+/i", "", $request->header('Authorization'));
        $user = User::getByToken($token);
        if ($user) {
            Auth::login($user);
        }

        if (Auth::check()) {
            return $this->auth->shouldUse(null);
        }

        $this->unauthenticated($request, $guards);
    }
}
