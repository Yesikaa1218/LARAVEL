<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongresoLicenciaturaRegistro extends Model
{
    use HasFactory;

    protected $table = "congreso_licenciatura_registro";

    protected $fillable =[
        'licenciatura_congresos_id',
        'congresos_users_id',
    ];

    public function congresoUser(){
        return $this->hasOne(CongresoUser::class, 'id', 'congresos_users_id');
    }

    public function licenciaturaCongreso(){
        return $this->hasOne(LicenciaturaCongreso::class, 'id', 'licenciatura_congresos_id');
    }
}
