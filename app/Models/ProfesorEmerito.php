<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesorEmerito extends Model
{
    use HasFactory;

    protected $table = 'profesores_emeritos';

    protected $fillable = [
        'name',
        'slug',
        'biography',
        'image',
        'active',
    ];
}
