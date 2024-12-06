<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sustentabilidad extends Model
{
    use HasFactory;

    protected $table = 'sustentabilidad';

    protected $fillable = [
        'content_page',
        'image_description',
        'image',
        'active',
    ];
}
