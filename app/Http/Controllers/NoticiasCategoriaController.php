<?php

namespace App\Http\Controllers;

use App\Models\NoticiasCategoria;
use Illuminate\Http\Request;

class NoticiasCategoriaController extends Controller
{
    public function index()
    {
        return view('System.Noticias_Categorias.index');
    }

    public function dataindex(){

            return datatables(NoticiasCategoria::all())

                ->addColumn('color_data', 'System.Noticias_Categorias.color')
                ->addColumn('btn', 'System.Noticias_Categorias.btn')
                ->rawColumns(['btn', 'color_data'])
                ->toJson();
    }


    public function create()
    {
        return view('System.Noticias_Categorias.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'color' => 'required',
        ]);

        $data = new NoticiasCategoria();
        $data->fill($request->all());
        $data->save();

        flash('Categoría Registrada Correctamente')->success();
        return redirect(route('sistema.noticias.categorias.index'));
    }

    public function edit($id)
    {
        $data = NoticiasCategoria::find($id);
        return view('System.Noticias_Categorias.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'color' => 'required',
        ]);
        $data = NoticiasCategoria::find($id);
        $data->fill($request->all());
        $data->active = 0;
        $data->save();

        flash('Categoría Editada Correctamente')->success();
        return redirect(route('sistema.noticias.categorias.index'));
    }

    public function destroy($id)
    {
        $data = NoticiasCategoria::find($id);
        $data->delete();
        flash('Categoría Eliminada Correctamente')->success();
        return redirect(route('sistema.noticias.categorias.index'));
    }

    public function approve($id)
    {   
        $publicacion = NoticiasCategoria::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.noticias.categorias.index'));
    }
}
