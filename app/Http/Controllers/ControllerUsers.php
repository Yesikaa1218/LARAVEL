<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Http\Request;

class ControllerUsers extends Controller
{
    public function import(Request $request){
        Excel::import(new UsersImport, $request->file('file'));

        return redirect('SistemaEscolar/empleados')->with('success', 'All good!');         
    }
}
