<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $table = 'examen';

    protected $fillable = [ 
        'nombre',
        'cantidad_problemas',
        'semestre',
        'periodo_academico',
        'active'
    ];

    public function materiaLaboratorio(){
        return $this->hasOne(MateriaLaboratorio::class, 'id', 'materia_laboratorio_id');
    }

    public function temaMateria(){
        return $this->hasOne(TemaMateria::class, 'id', 'tema_materia_id');
    }

}
