<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioSocial extends Model
{
    use HasFactory;

    protected $table = 'servicio_social';

    protected $fillable = [
        'content_page',
        'image_description',
        'image',
        'active',
    ];

}
