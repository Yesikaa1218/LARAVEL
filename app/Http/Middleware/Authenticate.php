<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // Verifica el guard que está siendo utilizado y redirige en consecuencia
            if ($request->is('empleado/*')) {
                return route('SistemaEscolar.empleado.login');
            } else {
                return route('login');
            }
        }
    }
}


/*
<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

     /*
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // Verifica el guard que está siendo utilizado y redirige en consecuencia
            $guard = $request->is('SistemaEscolar/*') ? 'empleado' : 'web';

            if ($guard == "empleado") {
                return route('SistemaEscolar.empleado.login'); // Modifica la ruta según tu estructura
            } else {
                return route('login');
            }
        }
    }
}
*/