<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuiaEXEN extends Model
{
    use HasFactory;

    protected $table = 'guia_exen';

    protected $fillable = [
        'content_page',
        'active',
    ];
}
