<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posgrado;
use App\Models\PosgradoProfesor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PosgradoProfesorController extends Controller
{    
    public function index()
    {
        return view('System.Posgrados.Profesores.index');
    }

    public function dataindex() {
        $user = Auth::user();

        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){ 
            return datatables(PosgradoProfesor::with('posgrado')->get())
            ->addColumn('btn', 'System.Posgrados.Profesores.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }
        else
        {

            if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){

                //Retornar el datatable con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas

                return datatables(PosgradoProfesor::with('posgrado')->whereIn('posgrado_id', [1, 5])->get())
                    ->addColumn('btn', 'System.Posgrados.Profesores.btn')
                    ->rawColumns(['btn'])
                    ->toJson();
            }

            if($user->hasAnyPermission('posgrado.maestria.com')) $posgrado = 1;
            if($user->hasAnyPermission('posgrado.maestria.if')) $posgrado = 2;
            if($user->hasAnyPermission('posgrado.maestria.isi')) $posgrado = 3;
            if($user->hasAnyPermission('posgrado.maestria.apta')) $posgrado = 4;
            if($user->hasAnyPermission('posgrado.doctorado.m')) $posgrado = 5;
            if($user->hasAnyPermission('posgrado.doctorado.if')) $posgrado = 6;
            if($user->hasAnyPermission('posgrado.maestria.cdd')) $posgrado = 7;
            
            return datatables(PosgradoProfesor::with('posgrado')->where('posgrado_id', $posgrado)->get())
                ->addColumn('btn', 'System.Posgrados.Profesores.btn')
                ->rawColumns(['btn'])
                ->toJson();
        
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
        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){  
            $posgrados = Posgrado::all();
        }
        else
        {
            if($user->hasAnyPermission('posgrado.maestria.com')) $posgrado = 1;
            if($user->hasAnyPermission('posgrado.maestria.if')) $posgrado = 2;
            if($user->hasAnyPermission('posgrado.maestria.isi')) $posgrado = 3;
            if($user->hasAnyPermission('posgrado.maestria.apta')) $posgrado = 4;

            if($user->hasAnyPermission('posgrado.doctorado.m')) $posgrado = 5;
            if($user->hasAnyPermission('posgrado.doctorado.if')) $posgrado = 6;
            if($user->hasAnyPermission('posgrado.maestria.cdd')) $posgrado = 7;

            $posgrados = Posgrado::where('id', $posgrado)->get();
            
            if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){

                //Retornar los posgrados con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas
                $posgrados = Posgrado::whereIn('id', [1, 5])->get();
            }
        }

        return view('System.Posgrados.Profesores.create', compact('posgrados'));
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
            'imagen' => 'required|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png,jpg|max:1024',
            'semblante' => 'sometimes',
            
        ]);

        $data = new PosgradoProfesor();
        $data->fill($request->all());
        if($request->file('imagen')) {
            $data->imagen = $request->file('imagen')->store('profesores_posgrado', 'public');
            
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.posgrados.profesores.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PosgradoProfesor::find($id);
        $user = Auth::user();
        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){  
            $posgrados = Posgrado::all();
        }
        else
        {

            if($user->hasAnyPermission('posgrado.maestria.com')) $posgrado = 1;
            if($user->hasAnyPermission('posgrado.maestria.if')) $posgrado = 2;
            if($user->hasAnyPermission('posgrado.maestria.isi')) $posgrado = 3;
            if($user->hasAnyPermission('posgrado.maestria.apta')) $posgrado = 4;

            if($user->hasAnyPermission('posgrado.doctorado.m')) $posgrado = 5;
            if($user->hasAnyPermission('posgrado.doctorado.if')) $posgrado = 6;
            if($user->hasAnyPermission('posgrado.maestria.cdd')) $posgrado = 7;

            $posgrados = Posgrado::where('id', $posgrado)->get();


            if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){

                //Retornar los posgrados con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas
                $posgrados = Posgrado::whereIn('id', [1, 5])->get();
            }
        }

        return view('System.Posgrados.Profesores.edit', compact('data', 'posgrados'));
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
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png,jpg|max:1024',
            'semblante' => 'sometimes',
            
        ]);

        $data = PosgradoProfesor::find($id);
        $data->fill($request->all());
        if($request->imagen) {
            Storage::delete($data->imagen);
            $data->imagen = $request->file('imagen')->store('profesores_posgrado', 'public');
        }
        //$data->active = 0;
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.posgrados.profesores.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = PosgradoProfesor::findOrFail($id);
        $profesor->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.posgrados.profesores.index'));
    }

    public function approve($id)
    {
        $publicacion = PosgradoProfesor::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.posgrados.profesores.index'));
    }
}
