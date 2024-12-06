<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenciaturaProfesor extends Model
{
    use HasFactory;
    protected $table = 'licenciatura_profesores'; 

    protected $fillable = [
        'nombre_profesor',
        'email',
        'contacto',
        'imagen',
        'licenciatura_id',
        'active'
    ];

    public function licenciatura(){
        return $this->hasOne(Licenciatura::class, 'id', 'licenciatura_id');
    }
}
