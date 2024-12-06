<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoMateria extends Model
{
    protected $table = 'grupos_Materias'; // Nombre de la tabla

    protected $primaryKey = 'idGrupo'; // Clave primaria

    protected $fillable = ['descripcion', 'Activo']; // Campos que se pueden llenar masivamente
}