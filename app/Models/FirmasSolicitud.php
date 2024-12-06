<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmasSolicitud extends Model
{
    use HasFactory;

    protected $table = 'FirmasSolicitud';

    protected $fillable = [
        'solicitud_id',
        'firmaEscolar',
        'firmaDocente',
        'firmaCoordinador',
        'firmaSubAcademico',
    ];

    public function solicitud()
    {
        return $this->belongsTo(CambioCalificacionSolicitud::class, 'solicitud_id', 'idSolicitudCambio');
    }

    public function firmaEscolarEmpleado()
    {
        return $this->belongsTo(Empleado::class, 'firmaEscolar', 'id');
    }

    public function firmaDocenteEmpleado()
    {
        return $this->belongsTo(Empleado::class, 'firmaDocente', 'id');
    }

    public function firmaCoordinadorEmpleado()
    {
        return $this->belongsTo(Empleado::class, 'firmaCoordinador', 'id');
    }

    public function firmaSubAcademicoEmpleado()
    {
        return $this->belongsTo(Empleado::class, 'firmaSubAcademico', 'id');
    }
}