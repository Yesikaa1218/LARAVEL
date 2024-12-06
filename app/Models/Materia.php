<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'materia_licenciatur',
        'creditos_materia_lic',
        'horas_semana_materia_lic',
        'optativa_materia_lic',
        'semestre_materia_lic',
        'descripcion_materia_lic',
        'requisitos_materia_lic',
        'licenciatura_id',
        'plan_de_estudio_id'
    ];

    public function licenciatura(){
        return $this->hasOne(Licenciatura::class, 'id', 'licenciatura_id');
    }

    public function planEstudios(){
        return $this->hasOne(PlanEstudios::class,  'plan_de_estudio_id' , 'id');
    }
}