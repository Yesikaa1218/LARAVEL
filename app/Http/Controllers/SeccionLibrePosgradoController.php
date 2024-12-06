<?php
namespace App\Http\Controllers;

use App\Models\SeccionLibrePosgrado;
use App\Models\Posgrado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SeccionLibrePosgradoController extends Controller
{
    public function dataindex(){
        return datatables(SeccionLibrePosgrado::get())
        ->addColumn('btn', 'System.Posgrados.SeccionLibre.btn')
        ->rawColumns(['btn'])
        ->toJson();

}
    public function index(){
        $data = SeccionLibrePosgrado::get();
        return view('System.Posgrados.SeccionLibre.index',compact('data'));
    }
    

    public function create(){
        $posgrado=Posgrado::all();
        return view('System.Posgrados.SeccionLibre.create',compact('posgrado'));
    }

    public function store(Request $request){
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
            'posgrado_id' => 'required',
            
        ]);
        $posgrado=Posgrado::where('id',$request->posgrado_id)->get()->first();

        $data = new SeccionLibrePosgrado();
        $data->active = 0;
        $data->posgrado_id=$posgrado->posgrado_id;
        
        $data->fill($request->all());
        dd($data);
        if($request->file('imagen')){
            $data->imagen = $request->file('imagen')->store( 'seccion-libre','public');
        }
        $data->save();

        flash('Sección Registrada Correctamente')->success();
        return redirect()->route('sistema.posgrados.seccion-libre.index');
    }
    
    public function edit($id){
        $data = SeccionLibrePosgrado::find($id);
        $posgrado = Posgrado::all();
        return view('System.Posgrados.SeccionLibre.edit', compact('data', 'posgrado'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'imagen' => 'sometimes|image|dimensions:max-width=1920,max-height=1080|mimes:jpeg,png|max:1024',
            'posgrado_id' => 'required',
            
        ]);

        $data = SeccionLibrePosgrado::find($id);
        if($request->file('imagen') != ''){
            Storage::delete($data->image);

            $data->imagen = $request->file('imagen')->store('seccion-libre','public');
            Storage::disk('public')->put('seccion-libre', $request->file('imagen'));
        }
        $data->fill($request->all());
        $data->save();

        flash('Sección Editado Correctamente')->success();
        return redirect()->route('sistema.posgrados.seccion-libre.index');
    }

    public function uploadTinyImage(Request $request) {
        $imagePath = $request->file('file')->store('seccion-libre', 'public');
        return response()->json(['location' => "/storage/$imagePath"]);
    }

    public function destroy($id){

        $data = SeccionLibrePosgrado::find($id);
        $data->delete();
        flash('Aviso Eliminada Correctamente')->success();
        return redirect(route('System.Posgrados.SeccionLibre.index'));
    }


    public function approve($id)
    {
        $publicacion = SeccionLibrePosgrado::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.posgrados.seccion-libre.index'));
    }
}
