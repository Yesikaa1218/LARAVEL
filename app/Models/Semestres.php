<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestres extends Model
{
    use HasFactory;

    protected $table = 'semestres';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_final',
        'seleccionado'
    ];

}
