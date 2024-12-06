<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titulo',
        'slug',
        'contenido',
        'imagen',
        'noticia_categoria_id'
    ];

    public function categoria(){
        return $this->hasOne(NoticiasCategoria::class, 'id', 'noticia_categoria_id');
    }

}
