<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongresoUser;

class CongresosUsersController extends Controller
{   
    public function index()
    {       
        return view('System.CongresoUsuarios.index');
    }

    public function dataindex(){
        
        $data = CongresoUser::all();


        return datatables($data)
            ->addColumn('btn', 'System.CongresoUsuarios.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
