<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linares extends Model
{
    use HasFactory;
    protected $table = 'linares';

    protected $fillable = [
        'content_page',
        'link1',
        'texto_link1',
        'active',
    ];
}
