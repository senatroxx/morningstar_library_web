<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request, string...$guards)
    {
        foreach ($guards as $guard) {
            if (!$this->auth->guard($guard)->check()) {
                // Handle unauthorized access
                return abort(401, 'Unauthorized');
            }
        }
    }
}
