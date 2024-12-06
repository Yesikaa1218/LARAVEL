<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstrategiaDigital extends Model
{
    use HasFactory;
    
    protected $table = 'estrategia_digital';

    protected $fillable = [
        'content_page',
        'link1',
        'texto_link1',
        'link2',
        'texto_link2',
        'link3',
        'texto_link3',
        'link4',
        'texto_link4',
        'active',
    ];
}
