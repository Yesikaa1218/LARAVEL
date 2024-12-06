<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoEmpleado extends Model
{
    protected $table = 'grupos_empleados'; // Nombre de la tabla

    protected $primaryKey = 'idGrupoEmpleado'; // Clave primaria

    protected $fillable = ['fkEmpleado', 'fkGrupo', 'Activo']; // Campos que se pueden llenar masivamente

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'fkEmpleado', 'idEmpleado');
    }

    public function grupoMateria()
    {
        return $this->belongsTo(GrupoMateria::class, 'fkGrupo', 'idGrupo');
    }
}
