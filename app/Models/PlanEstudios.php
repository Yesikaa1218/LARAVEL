<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanEstudios extends Model
{
    use HasFactory;

    protected $table = 'planes_de_estudios';

    protected $fillable = [
        'name',
        'active',
        'licenciatura_id'
    ];

    public function licenciatura(){
        return $this->hasOne(Licenciatura::class, 'id', 'licenciatura_id');
    }

    public function materias(){
        return $this->hasMany(Materia::class, 'plan_de_estudio_id', 'id');
    }
}
