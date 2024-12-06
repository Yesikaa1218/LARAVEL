<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anuncios extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'anuncios';

    protected $fillable = [
        'titulo',
        'contenido',
        'slug',
        'imagen',
        'imagenes',
        'documento',
        'fecha_inicio',
        'fehca_final',
        'aviso_categoria_id',
        'user_id',
        'mostrar_aviso',
        'imagen_inicio'
    ];

    public function categoria(){
        return $this->hasOne(AnunciosCategorias::class, 'id', 'aviso_categoria_id');
    }

    public function usuario(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    
    protected $casts = [
        // Cast imagenes JSON to array format
        'imagenes' => 'array'
    ];

}
