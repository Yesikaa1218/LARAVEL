<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/sistema/upload',
        '/sistema/emprendimiento/publicaciones/upload',
        '/sistema/emprendedores/proyectos/upload',
        '/sistema/noticias/upload',
        '/sistema/facultad/upload',
        '/sistema/becas/upload',
        '/sistema/congresos/upload',
        '/sistema/educacion-continua/upload',
        '/sistema/upload-images'
    ];
}
