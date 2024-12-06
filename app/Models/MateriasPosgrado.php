<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MateriasPosgrado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'materias_posgrados';

    protected $fillable = [
        'materia_posgrado',
        'creditos_materia_pos',
        'horas_semana_materia_pos',
        'optativa_materia_pos',
        'semestre_materia_pos',
        'descripcion_materia_pos',
        'requisitos_materia_pos',
        'posgrado_id',
        'plan_estudios_id'
    ];

    public function posgrado(){
        return $this->hasOne(Posgrado::class, 'id', 'posgrado_id');
    }
}
