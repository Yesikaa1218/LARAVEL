<?php

namespace App\Http\Controllers;

use App\Models\Licenciatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LicenciaturaIndicadores extends Controller
{
    public function index() {
        return view('System.Licenciaturas.licenciaturas');
        //return true;
    }

    
    
}