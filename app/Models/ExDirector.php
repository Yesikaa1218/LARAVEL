<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExDirector extends Model
{
    use HasFactory;

    protected $table = 'ex_directores';

    protected $fillable = [
        'name',
        'slug',
        'fecha_inicio',
        'fecha_final',
        'biography',
        'image',
        'active',
    ];
}
