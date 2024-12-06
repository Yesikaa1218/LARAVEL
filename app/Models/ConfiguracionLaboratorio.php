<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionLaboratorio extends Model
{
    use HasFactory;

    protected $table = 'configuraciones_laboratorio';

    protected $fillable = [
        'laboratorio_id',
        'elemento_id',
        'tipo_elemento',
        'posicion_top',
        'posicion_left',
        'width',
        'height',
        'src'
    ];
}
