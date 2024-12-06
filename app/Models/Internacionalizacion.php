<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internacionalizacion extends Model
{
    use HasFactory;
    protected $table = 'internacionalization';

    protected $fillable = [
        'content_page',
        'link1',
        'texto_link1',
        'link2',
        'texto_link2',
        'active',
    ];
}
