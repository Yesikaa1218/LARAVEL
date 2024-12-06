<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcreditacionesIndicadoresLicenciaturas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'acreditaciones_indicadores_licenciaturas';

    protected $fillable = [
        'nombre',
        'imagen',
        'valor',
        'semestre_id',
        'licenciatura_id'
    ];

    public function licenciatura(){
        return  $this->hasOne(Licenciatura::class, 'id', 'licenciatura_id');
    }

    public function semestre(){
        return $this->hasOne(Semestres::class, 'id', 'semestre_id');
    }
}
