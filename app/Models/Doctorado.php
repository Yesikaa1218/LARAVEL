<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorado extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_doctorado',
        'banner_del_doctorado',
        'nombre_coordinador_doctorado',
        'informacion_de_contacto_doctorado',
        'foto_del_coordinador',
        'descripcion_general_doctorado',
        'duracion_de_doctorado',
        'perfil_de_ingreso_doctorado',
        'perfil_de_egreso_doctorado',
    ];
}
