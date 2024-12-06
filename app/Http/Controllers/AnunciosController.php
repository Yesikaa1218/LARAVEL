<?php

namespace App\Http\Controllers;

use App\Models\Anuncios;
use App\Models\AnunciosCategorias;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnunciosController extends Controller
{

    
    public function index(){
        return view('System.Anuncios.index');
    }

    public function dataindex(){
        return datatables(Anuncios::with('categoria')->with('usuario')->get())
            ->addColumn('fecha_inicial', function (Anuncios $anuncios) {
                return \Carbon\Carbon::parse(strtotime($anuncios->fecha_inicio))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('fecha_final', function (Anuncios $anuncios) {
                return \Carbon\Carbon::parse(strtotime($anuncios->fehca_final))->formatLocalized('%d/%m/%Y');
            })
            ->addColumn('dtMostrarAviso',  function(Anuncios $mostrarInicioPagina) {
                if($mostrarInicioPagina->mostrar_aviso === 0) {
                    return 'No';
                }else{
                    return 'Sí';
                }
            })
            ->addColumn('btn', 'System.Anuncios.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create(){
        $data = AnunciosCategorias::all();
        $usuarios = User::all();
        return view('System.Anuncios.create', compact('data', 'usuarios'));
    }

    public function store(Request $request) {
 
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'required|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
            'imagenes.*' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
            'documento' => 'sometimes|mimes:pdf',
            'fecha_inicio' => 'required',
            'fehca_final' => 'required',
            'aviso_categoria_id' => 'required',
            'imagen_inicio' => 'sometimes|image|dimensions:max-width=800,max-height=200|mimes:jpeg,png'
        ]);



        $data = new Anuncios();
        $data->fill($request->all());

        if($request->mostrarInicio === 'on'){
            $data->mostrar_aviso = 1;
        }else {
            $data->mostrar_aviso = 0;
        }

        if(empty($request->imagenes)){
            $data->imagenes = null;
        }
        else{
            $imagesArray = array();
            foreach($request->imagenes as $key => $image){
                
                $filePath = $image->store('storage/avisos', "custom_public");
                $imageUrl = str_replace('storage/', '', $filePath);
                array_push($imagesArray, $imageUrl);

            }
            $data->imagenes = json_encode($imagesArray);
        }

        

        if($request->file('imagen')){
            $filePath = $request->file('imagen')->store('storage/avisos', "custom_public");
            $data->imagen = str_replace('storage/', '', $filePath);
        }
        if($request->file('imagen_inicio')){
            $filePath = $request->file('imagen_inicio')->store('storage/avisosCarrusel', "custom_public");
            $data->imagen = str_replace('storage/', '', $filePath);
        }

        if($request->file('documento')){
            $filePath = $request->file('documento')->store('storage/documentos', "custom_public");
            $data->documento = str_replace('storage/', '', $filePath);
        }
        else {
            $data->documento = null;
        }
        
        $data->save();

        flash('Aviso Registrado Correctamente')->success();
        return redirect(route('sistema.avisos.index'));
    }

    public function edit($id){
        $data = Anuncios::find($id);
        $cate = AnunciosCategorias::all();
        $usuarios = User::all();
        return view('System.Anuncios.edit', compact('data', 'cate', 'usuarios'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'sometimes|image|dimensions:max_width=1920,max_height=1080|mimes:jpeg,png,jpg|max:1024',
            'imagenes.*' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
            'imagenesviejas.*' => 'sometimes',
            'documento' => 'sometimes|mimes:pdf',
            'fecha_inicio' => 'required',
            'fehca_final' => 'required',
            'aviso_categoria_id' => 'required',
            'mostrar_aviso' => 'sometimes',
            'imagen_inicio' => 'image|dimensions:max-width=800,max-height=200|mimes:jpeg,png'
        ]);

       
        $data = Anuncios::find($id);
        $data->fill($request->all());

        if($request->mostrarInicio === 'on'){
            $data->mostrar_aviso = 1;
        }else {
            $data->mostrar_aviso = 0;
        }

        $imagesArray = array();
        if(empty($request->imagenesviejas)){
            $data->imagenes = null;
        }
        else{
            foreach($request->imagenesviejas as $key => $image){
                array_push($imagesArray, $image);
            }
        }

        if(!empty($request->imagenes)){
            
            foreach($request->imagenes as $key => $image){
                
                $filePath = $image->store('storage/avisos', "custom_public");
                $imageUrl = str_replace('storage/', '', $filePath);
                array_push($imagesArray, $imageUrl);

            }
        }
        if(empty($imagesArray)){
            $data->imagenes = null;
        }else{
            $data->imagenes = json_encode($imagesArray);
        }

        if($request->file('imagen') != ''){
            Storage::delete($data->image);

            $filePath = $request->file('imagen')->store('storage/avisos', "custom_public");
            $data->imagen = str_replace('storage/', '', $filePath);
        }

        if($request->file('imagen_inicio') != ''){
            Storage::delete($data->image);

            $filePath = $request->file('imagen_inicio')->store('storage/avisosCarrusel', "custom_public");
            $data->imagen = str_replace('storage/', '', $filePath);
        }
        
        if($request->file('documento') != '')// corregir que cuando actualiza se crea un nuevo documento sin eliminar el anterior
        {
            Storage::delete($data->documento);
            $filePath = $request->file('documento')->store('storage/documentos', "custom_public");
            $data->documento = str_replace('storage/', '', $filePath);
        }
        
        

        $data2 = Anuncios::find($id);
        $imagenesviejasAnuncio = json_decode($data2->imagenes);
        if($imagenesviejasAnuncio){
    
            if(empty($request->imagenesviejas)){ //quiere decir que eliminó todas
                foreach($imagenesviejasAnuncio as $key => $image){
                    Storage::delete($image);
                    
                }
            }else{
                foreach($imagenesviejasAnuncio as $key => $image){
                    $found = false;
                    foreach($request->imagenesviejas as $key => $image2){
                        if($image == $image2){
                            $found = true;
                        }
                    }
                    if(!$found){
                        Storage::delete($image);
                    }
                }
            }
        }
        
        $data->save();

        flash('Aviso Editado Correctamente')->success();
        return redirect(route('sistema.avisos.index'));
    }

    public function uploadTinyImage(Request $request) {
        $imagePath = $request->file('file')->store('anuncios', 'public');
        return response()->json(['location' => "/storage/$imagePath"]);
    }

    public function destroy($id){

        $data = Anuncios::find($id);
        $data->delete();
        flash('Aviso Eliminada Correctamente')->success();
        return redirect(route('sistema.avisos.index'));
    }

    public function approve($id)
    {
        $publicacion = Anuncios::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.avisos.index'));
    }

}
