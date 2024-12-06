<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CAADI extends Model
{
    use HasFactory;

    protected $table = 'caadi';

    protected $fillable = [
        'servicios',
        'image_description',
        'image',
        'reglamento',
        'inscripciones',
        'active',
    ];
}
