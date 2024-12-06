<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionEmprendimiento extends Model
{
    use HasFactory;

    protected $table = 'publicaciones_emprendimiento';

    protected $fillable = [
        'titulo',
        'slug',
        'contenido',
        'imagen',
        'active'
    ];
}
