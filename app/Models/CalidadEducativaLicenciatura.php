<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalidadEducativaLicenciatura extends Model
{
    use HasFactory;
    protected $table = 'calidad_educativa_licenciatura';

    protected $fillable = [
        'mision',
        'vision',
        'objetivos',
        'perfil_de_egresados',
        'licenciatura_id',
    ];

    public function licenciatura(){
        return $this->hasOne(Licenciatura::class, 'id', 'licenciatura_id');
    }
}
