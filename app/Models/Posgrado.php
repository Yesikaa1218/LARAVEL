<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posgrado extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'posgrados';

    protected $fillable = [
        'id',
        'nombre_posgrado',
        'banner_del_posgrado',
        'nombre_coordinador_posgrado',
        'correo',
        'telefono',
        'extension',
        'informacion_extra',
        'foto_del_coordinador',
        'descripcion_general_posgrado',
        'duracion_de_posgrado',
        'tipo_periodo',
        'perfil_de_ingreso_posgrado',
        'perfil_de_egreso_posgrado',
        'mision',
        'vision',
    ];


}
