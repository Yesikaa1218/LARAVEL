<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioDocumentos extends Model
{
    protected $fillable = [
        'nombre_documento',
        'url_documento',
      
    ];
    protected $appends = ['pdf_url'];

  


    public function getPdfUrlAttribute(){
        return asset("storage/$this->url_documento");
    }
    use HasFactory;
}
