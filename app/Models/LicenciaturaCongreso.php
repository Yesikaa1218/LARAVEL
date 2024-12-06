<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenciaturaCongreso extends Model
{
    use HasFactory;

    protected $table = "licenciatura_congresos";

    protected $fillable =[
        'id',
        'name',
        'fecha_evento',
        'fecha_inicial_registro',
        'fecha_final_registro',
        'content_page',
        'image_description',
        'image',
        'status',
        'registro_activo',
        'licenciatura_id',
        'slug'
    ];

    public function licenciatura(){
        return $this->hasOne(Licenciatura::class, 'id', 'licenciatura_id');
    }
}
