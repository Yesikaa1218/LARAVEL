<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestiladoAgave extends Model
{
    use HasFactory;

    protected $table = 'destilado_agave';

    protected $fillable = [
        'content_page',
    ];
}
