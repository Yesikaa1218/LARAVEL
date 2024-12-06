<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongresoUser;
use App\Models\PosgradoCongreso;

class CongresosPosgradoController extends Controller
{   
    public function index($id)
    {       
        $data = PosgradoCongreso::where('id', $id)->get();
        
        return view('System.Congresos.Posgrado.index', compact('data', 'id'));
    }

    public function dataindex($id){
        
        $data = CongresoUser::select('congresos_users.name', 'congresos_users.email', 'congresos_users.phone', 'congresos_users.adscripcion' )
            ->join('congreso_licenciatura_registro', 'congreso_licenciatura_registro.congresos_users_id' , '=', 'congresos_users.id') 
            ->join('licenciatura_congresos', 'congreso_licenciatura_registro.licenciatura_congresos_id', '=', 'licenciatura_congresos.id')
            ->where('licenciatura_congresos.id', $id)
            ->get();


        return datatables($data)
            ->addColumn('btn', 'System.Congresos.Licenciatura.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
