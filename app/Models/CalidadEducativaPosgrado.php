<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalidadEducativaPosgrado extends Model
{
    use HasFactory;
    protected $table = 'calidad_educativa_posgrado';

    protected $fillable = [
        'mision',
        'vision',
        'objetivos',
        'perfil_de_egresados',
        'posgrado_id',
    ];

    public function posgrado(){
        return $this->hasOne(Posgrado::class, 'id', 'posgrado_id');
    }
}
