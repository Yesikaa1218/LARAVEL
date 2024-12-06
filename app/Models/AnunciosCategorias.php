<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnunciosCategorias extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'anuncios_categorias';

    protected $fillable = [
        'nombre',
        'color'
    ];



}
