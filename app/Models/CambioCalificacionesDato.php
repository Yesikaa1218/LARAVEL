<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CambioCalificacionesDato extends Model
{
    protected $table = 'cambio_calificaciones_datos'; // Nombre de la tabla

    protected $primaryKey = 'id'; // Clave primaria

    protected $fillable = ['fkSolicitud', 'NombreAlumno', 'Matricula', 'fkTipoExamen', 'CalifCorrecta', 'CalifIncorrecta', 'Motivo', 'Activo'];

    public function tipoExamen()
    {
        return $this->belongsTo(TipoExamen::class, 'fkTipoExamen', 'idTipoExamen');
    }

    public function solicitudCambio()
    {
        return $this->belongsTo(CambioCalificacionSolicitud::class, 'fkSolicitud', 'idSolicitudCambio');
    }

    // Evento para cuando se elimina el modelo CambioCalificacionesDato
    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($model) {
            // Marcar la solicitud relacionada como inactiva
            if ($model->solicitudCambio) {
                $model->solicitudCambio->Activo = 0;
                $model->solicitudCambio->save();
            }
        });
    }


}
