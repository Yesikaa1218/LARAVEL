<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcreditacionesLicenciatura extends Model
{
    use HasFactory;

    protected $table = 'acreditaciones_licenciatura';

    protected $fillable = [
        'nombre_acreditacion',
        'logo_acreditacion',
        'active',
    ];

    public function licenciatura(){
        return $this->hasOne(Licenciatura::class, 'id', 'licenciatura_id');
    }
}
