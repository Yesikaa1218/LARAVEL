<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultadSeccion extends Model
{
    use HasFactory;

    protected $table = 'facultad_secciones';

    protected $fillable = [
        'title',
        'slug',
        'content_page',
        'pdf_url',
        'active',
    ];
}
