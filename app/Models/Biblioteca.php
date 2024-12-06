<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    use HasFactory;
    
    protected $table = 'biblioteca';

    protected $fillable = [
        'servicios',
        'horarios',
        'reglamento',
        'link1',
        'texto_link1',
        'link2',
        'texto_link2',
        'link3',
        'texto_link3',
        'link4',
        'texto_link4',
        'active',];

}
