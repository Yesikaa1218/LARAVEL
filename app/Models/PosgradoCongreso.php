<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosgradoCongreso extends Model
{
    use HasFactory;

    protected $table = "posgrado_congresos";

    protected $fillable =[
        'name',
        'slug',
        'fecha_evento',
        'fecha_inicial_registro',
        'fecha_final_registro',
        'content_page',
        'image_description',
        'image',
        'status',
        'registro_activo',
        'posgrado_id',
    ];

    public function posgrado(){
        return $this->hasOne(Posgrado::class, 'id', 'posgrado_id');
    }
}
