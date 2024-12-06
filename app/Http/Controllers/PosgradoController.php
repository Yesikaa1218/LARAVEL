<?php

namespace App\Http\Controllers;

use App\Models\Posgrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PosgradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('System.Posgrados.index');
    }

    public function dataindex() {

        $user = Auth::user();

        if($user->hasanyrole('SuperAdmin') || $user->hasanyrole('Posgrado') ){
        return datatables(Posgrado::all())
        ->addColumn('btn', 'System.Posgrados.btn')
        ->rawColumns(['btn'])
        ->toJson();
        }
        else
        {
            if($user->hasAnyPermission('posgrado.maestria.com') && $user->hasAnyPermission('posgrado.doctorado.m')){
                
                //Retornar el datatable con el Doctorado en Matemáticas y la Maestría en Ciencias con Orientación en Matemáticas
                return datatables(Posgrado::whereIn('id', [1, 5])->get())
                    ->addColumn('btn', 'System.Posgrados.btn')
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


            return datatables(Posgrado::where('id', $posgrado)->get())
                ->addColumn('btn', 'System.Posgrados.btn')
                ->rawColumns(['btn'])
                ->toJson();

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('System.Posgrados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'nombre_posgrado' => 'required',
            'banner_del_posgrado' => 'required|image|dimensions:max_width=1282,max_height=855|mimes:jpeg,png,jpg|max:1024',
            'nombre_coordinador_posgrado' => 'required',
            'correo' => 'required',
            'foto_del_coordinador' => 'required|image|mimes:jpeg,png,jpg',
            'descripcion_general_posgrado' => 'required',
            'duracion_de_posgrado' => 'required',
            'tipo_periodo' => 'required',
            'perfil_de_ingreso_posgrado' => 'required',
            'perfil_de_egreso_posgrado' => 'required',
        ]);

        $data = new Posgrado();
        $data->fill($request->all());
        if($request->file('banner_del_posgrado')){
            $data->banner_del_posgrado = $request->file('banner_del_posgrado')->store('banner_posgrados', 'public');
        }
        if($request->file('foto_del_coordinador')){
            $data->foto_del_coordinador = $request->file('foto_del_coordinador')->store('coordinadores_posgrado', 'public');
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.posgrados.posgrado.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maestria  $maestria
     * @return \Illuminate\Http\Response
     */
    public function show(Posgrado $maestria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maestria  $maestria
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = Posgrado::find($id);

        return view('System.Posgrados.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maestria  $maestria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'nombre_posgrado' => 'required',
            'banner_del_posgrado' => 'sometimes|image|dimensions:max_width=1282,max_height=855|mimes:jpeg,png,jpg|max:1024',
            'nombre_coordinador_posgrado' => 'required',
            'correo' => 'required',
            'foto_del_coordinador' => 'sometimes|image|mimes:jpeg,png,jpg',
            'descripcion_general_posgrado' => 'required',
            'duracion_de_posgrado' => 'required',
            'tipo_periodo' => 'required',
            'perfil_de_ingreso_posgrado' => 'required',
            'perfil_de_egreso_posgrado' => 'required',
        ]);

        $data = Posgrado::find($id);
        $data->fill($request->all());
        if($request->file('banner_del_posgrado') != '')
        {
            Storage::delete($data->banner_del_posgrado);
            $data->banner_del_posgrado = $request->file('banner_del_posgrado')->store('banner_posgrados', 'public');
        }
        if($request->file('foto_del_coordinador') != ''){
            Storage::delete($data->foto_del_coordinador);
            $data->foto_del_coordinador = $request->file('foto_del_coordinador')->store('coordinadores_posgrado', 'public');
        }
        $data->save();

        
        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.posgrados.posgrado.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maestria  $maestria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $maestria = Posgrado::findOrFail($id);
        $maestria->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.posgrados.posgrado.index'));
    }

    public function approve($id)
    {   
        $publicacion = Posgrado::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.posgrados.posgrado.index'));
    }
}
