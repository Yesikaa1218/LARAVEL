<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HandleGuardSessions
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // Cambiar el nombre de la sesión en función del guardia
        if ($guard) {
            Session::put('session_guard', $guard);
            config(['session.cookie' => config('session.cookie') . '_' . $guard]);
        }

        return $next($request);
    }
}
