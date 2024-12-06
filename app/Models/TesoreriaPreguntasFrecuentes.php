<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TesoreriaPreguntasFrecuentes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tesoreria_preguntas_frecuentes';

    protected $fillable = [
        'name',
        'slug',
        'content_page',
        'active',
    ];
    use HasFactory;
}