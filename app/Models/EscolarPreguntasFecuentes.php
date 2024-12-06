<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EscolarPreguntasFecuentes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'escolar_preguntas_fecuentes';

    protected $fillable = [
      'name',
        'slug',
        'content_page',
        'image',
        'image_description',
        'active',
    ];
}
