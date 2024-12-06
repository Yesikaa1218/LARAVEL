<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licenciatura extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre_licenciatura',
        'banner_licenciatura',
        'nombre_coordinador',
        'informacion_contacto',
        'foto_coordinador',
        'descripcion',
        'duracion',
        'perfil_ingreso',
        'perfil_egreso',
        'mision',
        'vision',
    ];

    public function materias(){
        return $this->hasMany(Materia::class, 'licenciatura_id', 'id');
    }

    public function laboratorios(){
        return $this->hasMany(Laboratorio::class);
    }


}
