<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idGrupo'; // Clave primaria de la tabla

    protected $fillable = [
        'descripcion', 'capacidad', 'fkEmpMat', 'Activo',
    ];


    public function empleadoMateria()
    {
        return $this->belongsTo(EmpleadoMateria::class, 'fkEmpMat', 'id');
    }
}