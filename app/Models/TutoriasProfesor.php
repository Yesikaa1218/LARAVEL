<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutoriasProfesor extends Model
{
    use HasFactory;
    protected $table = 'tutorias_profesores';

    protected $fillable = [
        'nombre_profesor',
        'email',
        'semestre',
    ];


}
