<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licenciatura;
use App\Models\LicenciaturaProfesor;
use Illuminate\Support\Facades\Auth;

class LicenciaturaProfesorController extends Controller
{    public function index()
    {
        return view('System.Licenciaturas.Profesores.index');
    }

    public function dataindex() {
        $user = Auth::user();
        if($user->hasanyrole('SuperAdmin')){  
            return datatables(LicenciaturaProfesor::with('licenciatura')->get())
            ->addColumn('btn', 'System.Licenciaturas.Profesores.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }
        else
        {
            {
                if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
                if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
                if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
                if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
                if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
                if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;

    
                return datatables(LicenciaturaProfesor::with('licenciatura')->where('licenciatura_id', $licenciatura)->get())
                    ->addColumn('btn', 'System.Licenciaturas.Profesores.btn')
                    ->rawColumns(['btn'])
                    ->toJson();
                
            }
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if($user->hasanyrole('SuperAdmin')){  
            $licenciaturas = Licenciatura::all();
        }
        else
        {
            if($user->hasAnyPermission('licenciaturas.lm')) $licenciatura = 1;
            if($user->hasAnyPermission('licenciaturas.lf')) $licenciatura = 2;
            if($user->hasAnyPermission('licenciaturas.lcc')) $licenciatura = 3;
            if($user->hasAnyPermission('licenciaturas.la')) $licenciatura = 4;
            if($user->hasAnyPermission('licenciaturas.lmad')) $licenciatura = 5;
            if($user->hasAnyPermission('licenciaturas.lsti')) $licenciatura = 6;
         
            $licenciaturas = Licenciatura::where('id', $licenciatura)->get();
        }
        return view('System.Licenciaturas.Profesores.create', compact('licenciaturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_profesor' => 'required',
            'email' => 'required',
        ]);

        $data = new LicenciaturaProfesor();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.profesores.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $data = LicenciaturaProfesor::find($id);
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

        return view('System.Licenciaturas.Profesores.edit', compact('data', 'licenciaturas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_profesor' => 'required',
            'email' => 'required',
        ]);

        $data = LicenciaturaProfesor::find($id);
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.profesores.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = LicenciaturaProfesor::findOrFail($id);
        $profesor->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.licenciaturas.profesores.index'));
    }

    public function approve($id)
    {   
        $profesor = LicenciaturaProfesor::findOrFail($id);
        $profesor->active = 1;
        $profesor->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.licenciaturas.profesores.index'));
    }
  
}
