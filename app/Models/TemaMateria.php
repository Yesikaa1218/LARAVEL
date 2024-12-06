<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaMateria extends Model
{
    use HasFactory;

    protected $table = 'tema_materia';

    protected $fillable = [
        'nombre',
        'titulo'
    ];
}
