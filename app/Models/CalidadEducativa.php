<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalidadEducativa extends Model
{
    use HasFactory;

    protected $table = 'calidad_educativa_informacion';

    protected $fillable = [
        'content_page',
        'image_description',
        'image',
        'active',
    ];
}
