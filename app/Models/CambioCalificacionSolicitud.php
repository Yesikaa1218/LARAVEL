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

    // Define relaciones si es necesario
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'fkGrupo', 'idGrupo');
    }

    public function planEstudios()
    {
        return $this->belongsTo(PlanEstudios::class, 'fkPlan', 'id');
    }
}

