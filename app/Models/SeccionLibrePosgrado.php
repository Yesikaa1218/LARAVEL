<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeccionLibrePosgrado extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'seccion_libre_posgrado';

    protected $fillable = [
        'titulo',
        'contenido',
        'slug',
        'imagen',
        'posgrado_id',
        
    ];
    public function posgrado(){
        return $this->hasOne(Posgrado::class, 'id', 'posgrado_id');
    }
}
