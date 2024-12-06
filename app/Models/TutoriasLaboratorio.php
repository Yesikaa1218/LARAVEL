<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutoriasLaboratorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_laboratorio',
        'url_laboratorio',
        'licenciatura_id',
    ];
    protected $appends = ['pdf_url'];

    public function licenciatura(){
        return $this->hasOne(Licenciatura::class, 'id', 'licenciatura_id');
    }


    public function getPdfUrlAttribute(){
        return asset("storage/$this->url_laboratorio");
    }
}
