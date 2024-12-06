<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class PlanesEstudioPosgrado extends Model
{
    use HasFactory;
    protected $table = 'planes_estudios_posgrado';

    protected $fillable =[
        'name',
        'periodo_academico_id',
        'posgrado_id',
    ];

    public function posgrado(){
        return $this->hasOne(Posgrado::class, 'id', 'posgrado_id');
    }
    public function periodo_academico(){
        return $this->hasOne(PeriodoAcademico::class, 'id', 'periodo_academico_id');
    }
    public function materias_posgrados(){
        return $this->hasMany(MateriasPosgrado::class, 'plan_estudios_id', 'id');
    }
}
