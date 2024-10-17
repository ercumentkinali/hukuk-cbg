<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ResetSessionOnHome
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        if ($request->is('/')) {
            Auth::logout();
            $request->session()->invalidate();
        }

        return $next($request);
    }
}
