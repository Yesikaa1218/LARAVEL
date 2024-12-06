<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaDeportiva extends Model
{
    use HasFactory;

    protected $table = 'disciplinas_deportivas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'image',
        'image_description',
        'active',
    ];
}
