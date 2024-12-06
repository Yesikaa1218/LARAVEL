<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratorioInformacion extends Model
{
    use HasFactory;

    protected $table = 'laboratorio_informacion';

    protected $fillable = [
        'examen_id',
        'materia_laboratorio_id',
        'tema_materia_id',
        'cantidad_problemas',
        'created_at',
    ];

    public function materialaboratorio(){
        return $this->hasOne(MateriaLaboratorio::class, 'id', 'materia_laboratorio_id');
    }

    public function temamateria(){
        return $this->hasOne(TemaMateria::class, 'id', 'tema_materia_id');
    }

    public function examen(){
        return $this->hasOne(Examen::class, 'examen_id', 'id');
    }
}
