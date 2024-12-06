<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniversidadSaludable extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'universidad_saludables';

    protected $fillable = [
        'content_page',
        'image_description',
        'image',
        'active',
    ];
}
