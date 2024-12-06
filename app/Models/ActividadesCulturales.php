<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActividadesCulturales extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'actividades_culturales';

    protected $fillable = [
        'content_page',
        'description_image',
        'image',
        'active',
    ];
}
