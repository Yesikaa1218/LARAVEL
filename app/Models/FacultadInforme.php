<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultadInforme extends Model
{
    use HasFactory;

    protected $table = 'facultad_informes';

    protected $fillable = [
        'title',
        'slug',
        'pdf',
        'content_page',
        'active',
    ];
}
