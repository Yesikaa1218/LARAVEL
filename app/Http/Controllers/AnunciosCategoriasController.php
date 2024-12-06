<?php

namespace App\Http\Controllers;

use App\Models\AnunciosCategorias;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnunciosCategoriasController extends Controller
{
    public function index(){
        return view('System.Anuncios_Categorias.index');
    }

    public function dataindex(){

            return datatables(AnunciosCategorias::all())

                ->addColumn('color_data', 'System.Anuncios_Categorias.color')
                ->addColumn('btn', 'System.Anuncios_Categorias.btn')
                ->rawColumns(['btn', 'color_data'])
                ->toJson();
    }  

    public function create(){
        return view('System.Anuncios_Categorias.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'color' => 'required',
        ]);

        $data = new AnunciosCategorias();
        $data->fill($request->all());
        $data->save();

        flash('Categoria Registrada Correctamente')->success();
        return redirect(route('sistema.avisos.categoria.index'));
    }

    public function edit($id){
        $data = AnunciosCategorias::find($id);
        return view('System.Anuncios_Categorias.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'color' => 'required',
        ]);
        $data = AnunciosCategorias::find($id);
        $data->fill($request->all());
        $data->save();

        flash('Categoria Editada Correctamente')->success();
        return redirect(route('sistema.avisos.categoria.index'));
    }

    public function destroy($id){

        $data = AnunciosCategorias::find($id);
        $data->delete();
        flash('Categoria Eliminada Correctamente')->success();
        return redirect(route('sistema.avisos.categoria.index'));
    }

    public function approve($id)
    {
        $publicacion = AnunciosCategorias::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.avisos.categoria.index'));
    }


}
