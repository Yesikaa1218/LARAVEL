<?php

namespace App\Http\Controllers;
use App\Models\CalidadEducativaLicenciatura;
use App\Models\AcreditacionesLicenciatura;
use App\Models\Licenciatura;
use Illuminate\Http\Request;

class CalidadEducativaLicenciaturaController extends Controller
{

    public function index()
    {
        return view('System.CalidadEducativa.Licenciaturas.index');
    }

    public function dataindex(){
        return datatables(CalidadEducativaLicenciatura::with('licenciatura')->get())
        ->addColumn('btn', 'System.CalidadEducativa.Licenciaturas.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function create()
    {
        $licenciaturas = Licenciatura::all();
         
        return view('System.CalidadEducativa.Licenciaturas.create', compact('licenciaturas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mision' => 'required',
            'vision' => 'required',
            'objetivos' => 'required',
            'perfil_de_egresados' => 'required',
            'licenciatura_id' => 'required',
        ]);

        $data = new CalidadEducativaLicenciatura();
        $data->fill($request->all());
        $data->save();


        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.calidad-educativa.licenciaturas.index'));
    }


    public function edit($id){
       
        $data = CalidadEducativaLicenciatura::find($id);
        $licenciaturas = Licenciatura::all();
        $acreditaciones = AcreditacionesLicenciatura::all();

        return view('System.CalidadEducativa.Licenciaturas.edit', compact('data', 'licenciaturas', 'acreditaciones'));
    }


    public function update(Request $request, $id) {
        
        $request->validate([
            'mision' => 'required',
            'vision' => 'required',
            'objetivos' => 'required',
            'perfil_de_egresados' => 'required',
            'licenciatura_id' => 'required',
        ]);

        $data = CalidadEducativaLicenciatura::find($id);
        $data->fill($request->all());
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.calidad-educativa.licenciaturas.index'));
    }

    public function approve($id)
    {   
        $publicacion = CalidadEducativaLicenciatura::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.calidad-educativa.licenciaturas.index'));
    }
}
