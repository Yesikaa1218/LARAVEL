<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosEmprendimiento extends Model
{
    use HasFactory;

    protected $table = 'proyectos_emprendimiento';

    protected $fillable = [
        'nombre',
        'slug',
        'estatus',
        'descripcion',
        'imagen',
        'active',
    ];
}
