<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SociedadAlumnos extends Model
{
    use HasFactory;

    protected $table = 'sociedad_alumnos';

    protected $fillable = [ // abs: lo que se puede llenar 
        'content_page',
        'active',
    ];
    
}
