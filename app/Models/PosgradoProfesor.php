<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosgradoProfesor extends Model
{
    use HasFactory;
    protected $table = 'posgrado_profesores';

    protected $fillable = [
        'nombre_profesor',
        'email',
        'contacto',
        'imagen',
        'posgrado_id',
        'semblante',
    ];

    public function posgrado(){
        return $this->hasOne(Posgrado::class, 'id', 'posgrado_id');
    }
}
