<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemasLaboratorio extends Model
{
    use HasFactory;

    protected $table = 'problema_laboratorio';

    protected $fillable = [ 
        'nombre',
        'problema',
        'semestre',
        'materia_laboratorio_id',
        'tema_materia_id'
    ];

    public function materias(){
        return $this->hasOne(MateriaLaboratorio::class, 'id', 'materia_laboratorio_id');
    }

    public function temaateria(){
        return $this->hasOne(TemaMateria::class, 'id', 'tema_materia_id');
    }

}
