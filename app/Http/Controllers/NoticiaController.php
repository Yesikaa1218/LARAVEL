<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\NoticiasCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Licenciatura;
use App\Models\Posgrado;
use App\Models\FacultadSeccion;

class NoticiaController extends Controller
{
    public function index()
    {
        return view('System.Noticias.index');
    }

    public function dataindex(){
        return datatables(Noticia::with('categoria')->get())
            ->addColumn('btn', 'System.Noticias.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        $data = NoticiasCategoria::all();
        return view('System.Noticias.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'required|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
            'noticia_categoria_id' => 'required',
        ]);

        $data = new Noticia();
        $data->fill($request->all());
        if($request->file('imagen')){
            $data->imagen = $request->file('imagen')->store('noticias', 'public');
        }
        $data->save();

        flash('Noticia Registrada Correctamente')->success();
        return redirect(route('sistema.noticias.index'));
    }

    public function edit($id)
    {
        $data = Noticia::find($id);
        $cate = NoticiasCategoria::all();
        return view('System.Noticias.edit', compact('data', 'cate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'sometimes|image|dimensions:max_width=1920,max_height=1080|mimes:jpeg,png,jpg|max:1024',
            'noticia_categoria_id' => 'required',
        ]);

        $data = Noticia::find($id);
        $data->fill($request->all());
        if($request->file('imagen') != '')
        {
            Storage::delete($data->imagen);
            $data->imagen = $request->file('imagen')->store('noticias', 'public');
        }
        $data->active = 0;
        $data->save();

        flash('Noticia Editada Correctamente')->success();
        return redirect(route('sistema.noticias.index'));
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.noticias.index'));
    }

    public function uploadTinyImage(Request $request){
        $imagePath = $request->file('file')->store('noticias', 'public');

        return response()->json(['location' => "/storage/$imagePath"]);
    }

    public function approve($id)
    {
        $publicacion = Noticia::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.noticias.index'));
    }

    

}
