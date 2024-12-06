<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcreditacionesIndicadoresPosgrado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'acreditaciones_indicadores_posgrados';

    protected $fillable = [
        'nombre',
        'imagen',
        'valor',
        'semestre_id',
        'posgrado_id'
    ];

    public function posgrado(){
        return  $this->hasOne(Posgrado::class, 'id', 'posgrado_id');
    }

    public function semestre(){
        return $this->hasOne(Semestres::class, 'id', 'semestre_id');
    }
}
