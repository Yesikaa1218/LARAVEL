<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asesorias extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'asesorias';

    protected $fillable = [
        'content_page',
        'image_description',
        'image',
        'active',
    ];
}
