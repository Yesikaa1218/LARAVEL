<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuiaNuevoIngreso extends Model
{
    use HasFactory;

    protected $table = 'guia_nuevo_ingreso';

    protected $fillable = [
        'content_page',
        'active',
    ];
}
