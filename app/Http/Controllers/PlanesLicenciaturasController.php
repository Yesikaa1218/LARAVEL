<?php
namespace App\Http\Controllers;
use App\Models\Licenciatura;
use App\Models\LicenciaturaProfesor;
use App\Models\PlanEstudios;
use Illuminate\Http\Request;
use App\Imports\MateriaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class PlanesLicenciaturasController extends Controller
{
    public function index()
    {
        return view('System.Licenciaturas.PlanesEstudios.index');
    }

    public function dataindex(){
        $user = Auth::user();

        if($user->hasanyrole('SuperAdmin')){
            return datatables(PlanEstudios::with('licenciatura')->get())
                ->addColumn('btn', 'System.Licenciaturas.PlanesEstudios.btn')
                ->rawColumns(['btn'])
                ->toJson();
        }
        else{
            if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
            if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
            if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
            if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
            if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
            if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;

            return datatables(PlanEstudios::with('licenciatura')->where('licenciatura_id', $licenciatura)->get())
                ->addColumn('btn', 'System.Licenciaturas.PlanesEstudios.btn')
                ->rawColumns(['btn'])
                ->toJson();
        }

    }

    public function create()
    {
        $user = Auth::user();

        if($user->hasanyrole('SuperAdmin')){
            $licenciaturas = Licenciatura::all();
        }
        else{
            if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
            if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
            if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
            if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
            if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
            if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;

            $licenciaturas = Licenciatura::where('id', $licenciatura)->get();
        }
        return view('System.Licenciaturas.PlanesEstudios.create', compact('licenciaturas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'licenciatura_id' => 'required',
            'name' => 'required',
        ]);

        $data = new PlanEstudios();
        $data->fill($request->all());
        $data->save();

        flash('Plan de Estudios Registrado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.planes.index'));
    }


    public function edit($id){
            $data = PlanEstudios::find($id);
            $licenciaturas  = Licenciatura::all();
            return view('System.Licenciaturas.PlanesEstudios.edit', compact('data', 'licenciaturas'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'licenciatura_id' => 'required',
            'name' => 'required',
        ]);

        $data =  PlanEstudios::find($id);
        $data->fill($request->all());
        $data->save();
        flash('Plan de Estudios Editado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.planes.index'));
    }


    public function destroy($id)
    {
        $data = PlanEstudios::findOrFail($id);
        $data->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.planes.index'));
    }

}
