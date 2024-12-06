<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemaLaboratorioExamen extends Model
{
    use HasFactory;

    protected $table = 'problema_laboratorio_examen';

    protected $fillable = [
        'laboratorio_inf_id',
        'examen_id',
        'problema_laboratorio_id'
    ];

    public function laboratorioInformacion() {
        return $this->hasOne(LaboratorioInformacion::class, 'id', 'laboratorio_inf_id');
    }

    public function examen(){
        return $this->hasOne(Examen::class, 'id', 'examen_id');
    }

    public function problemaLaboratorio(){
        return $this->hasOne(ProblemasLaboratorio::class, 'id', 'problema_laboratorio_id');
    } 

}
