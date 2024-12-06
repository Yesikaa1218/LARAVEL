<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongresoUser extends Model
{
    use HasFactory;

    protected $table = "congresos_users";

    protected $fillable =[
        'id',
        'name',
        'email',
        'password',
        'phone',
        'image',
        'adscripcion',
    ];
}
