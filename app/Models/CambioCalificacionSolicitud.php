<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CambioCalificacionSolicitud extends Model
{
    protected $table = 'cambioscalificacionessolicitudes';
    protected $primaryKey = 'idSolicitudCambio';
    public $timestamps = true;

    protected $fillable = [
        'fkGrupo', 'fkPlan', 'Estatus', 'Activo',
    ];

    // Relación con la tabla 'grupos'
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'fkGrupo', 'idGrupo');
    }

    // Relación con la tabla 'plan_estudios'
    public function planEstudios()
    {
        return $this->belongsTo(PlanEstudios::class, 'fkPlan', 'id');
    }

    // Relación con la tabla 'cambio_calificaciones_datos'
    public function cambioCalificacionesDatos()
    {
        return $this->hasMany(CambioCalificacionesDato::class, 'fkSolicitud', 'idSolicitudCambio');
    }
}