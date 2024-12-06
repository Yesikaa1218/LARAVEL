<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UniversidadSaludableEventos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'universidad_saludable_eventos';

    protected $fillable = [
        'name',
        'content_page',
        'image_description',
        'date',
        'hour',
        'image',
        'active',
    ];

}
