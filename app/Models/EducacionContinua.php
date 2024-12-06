<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducacionContinua extends Model
{
    use HasFactory;

    protected $table = 'educacion_continua';

    protected $fillable = [
        'content_page',
        'image_description',
        'image',
        'active',
        'link',
        'texto_link',
    ];
}
