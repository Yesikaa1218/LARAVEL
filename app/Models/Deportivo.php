<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deportivo extends Model
{
    use HasFactory;

    protected $table = "deportivo";

    protected $fillable =[
        'content_page',
        'image',
        'image_description',
        'active',
    ];
}
