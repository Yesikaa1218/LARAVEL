<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongresoRegister extends Model
{
    use HasFactory;

    protected $table = "congresos_users_register";

    protected $fillable =[
        'licenciatura_congresos_id',
        'posgrado_congresos_id',
        'congresos_users_id',
    ];

    public function congresoUser(){
        return $this->hasOne(CongresoUser::class, 'id', 'congresos_users_id');
    }

    public function licenciaturaCongreso(){
        return $this->hasOne(LicenciaturaCongreso::class, 'id', 'licenciatura_congresos_id');
    }

    public function posgradoCongreso(){
        return $this->hasOne(PosgradoCongreso::class, 'id', 'posgrado_congresos_id');
    }

}
