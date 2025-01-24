<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoMateria extends Model
{
    protected $table = 'empleados_materias';

    protected $fillable = ['fkEmpleado', 'fkMateria', 'Activo'];

    public $timestamps = false; 

    public function empleado()
    {
       // return $this->belongsTo(Empleado::class, 'fkEmpleado', 'idEmpleado') ; validar si no causa error
       return $this->belongsTo(Empleado::class, 'fkEmpleado', 'id') ;
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'fkMateria', 'id');
    }
}

