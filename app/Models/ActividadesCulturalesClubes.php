<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActividadesCulturalesClubes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clubes_culturales';

    protected $fillable = [
        'name',
        'content_page',
        'image_description',
        'image',
        'active',
        'slug'
    ];
}
