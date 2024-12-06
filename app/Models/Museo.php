<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Museo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'museo'; 

    protected $fillable = [ 
        'titulo',
        'contenido',
        'imagen',
        'fecha_inicio',
        'fecha_fin',
        'slug',
        'documento'
    ];
}
