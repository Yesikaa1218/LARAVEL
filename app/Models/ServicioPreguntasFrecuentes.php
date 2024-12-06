<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicioPreguntasFrecuentes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'servicio_preguntas_frecuentes';

    protected $fillable = [
      'name',
        'slug',
        'content_page',
        'image',
        'image_description',
        'active',
    ];
    use HasFactory;
}
