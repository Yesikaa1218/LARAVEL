<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutorias extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tutorias';

    protected $fillable = [
        'content_page',
        'image_description',
        'image',
        'active',];

}
