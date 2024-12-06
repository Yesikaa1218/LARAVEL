<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongresosPosgradoRegistro extends Model
{
    use HasFactory;
    protected $table = "congreso_posgrado_registro";

    protected $fillable =[
        'posgrado_congresos_id',
        'congresos_users_id',
    ];
    public function congresoUser(){
        return $this->hasOne(CongresoUser::class, 'id', 'congresos_users_id');
    }
    public function posgradoCongreso(){
        return $this->hasOne(PosgradoCongreso::class, 'id', 'posgrado_congresos_id');
    }
}
