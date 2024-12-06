<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticasPreguntasFrecuentes extends Model
{
    use HasFactory;

    protected $table = 'practicas_preguntas_frecuentes';

    protected $fillable = [
        'name',
        'slug',
        'content_page',
        'image',
        'image_description',
        'active',
    ];

}
