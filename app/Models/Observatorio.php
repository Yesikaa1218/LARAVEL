<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observatorio extends Model
{
    use HasFactory;

    protected $table = 'observatorio';

    protected $fillable = [
        'titulo',
        'content_page',
    ]; 
}
