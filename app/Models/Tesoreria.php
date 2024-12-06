<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tesoreria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tesoreria';

    protected $fillable = [
        'content_page',
        'image_description',
        'image',
        'calendario_pagos_posgrado',
        'manual_cuota_interna',
        'solicitud_factura',
        'active',
    ];
}
