<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaLaboratorio extends Model
{
    use HasFactory;

    protected $table = 'materia_laboratorio';

    protected $fillable = [
        'nombre'
    ];
}
