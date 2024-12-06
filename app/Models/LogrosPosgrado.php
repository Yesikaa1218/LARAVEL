<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogrosPosgrado extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'logros_posgrado';

    protected $fillable = [
        'titulo',
        'descripcion',
        'active',
        'archivo',
        'posgrado_profesores_id',
        'nombre_profesor',
    ];

    protected $appends = ['pdf_url'];

    public function getPdfUrlAttribute(){
        return asset("storage/$this->url_documento");
    }

    public function posgrado_profesores(){
        return $this->hasOne(PosgradoProfesor::class, 'id', 'posgrado_profesores_id');
    }
}
