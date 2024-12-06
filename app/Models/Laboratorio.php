<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;

    protected $table = 'tutorias_laboratorios';

    protected $fillable = [
        'nombre_laboratorio',
        'url_laboratorio',
        'licenciatura_id'
    ];

}
