<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticaProfesional extends Model
{
    use HasFactory;

    protected $table = 'practicas_profesionales';

    protected $fillable = [
        'content_page',
        'image_description',
        'image',
        'active',
    ];
}
