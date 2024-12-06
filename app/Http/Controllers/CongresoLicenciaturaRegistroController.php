<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CongresoLicenciaturaRegistroController extends Controller
{
    public function index()
    {
        return view('System.Congresos.Licenciatura.index');
    }
}
