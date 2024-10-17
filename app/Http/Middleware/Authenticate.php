<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
        if ($request->is('/')) {
            Auth::logout();
            $request->session()->invalidate();
        }
        if (! $request->expectsJson()) {
            return route('login.form');
        }
        return null;
    }
}