<?php

namespace App\Http\Controllers;
use App\Models\ServicioDocumentos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServicioDocumentosController extends Controller
{
    public function index()
    {
        return view('System.ServicioSocial.Documentos.index');
    }

    public function dataindex(){
        return datatables(ServicioDocumentos::all())
        ->addColumn('btn', 'System.ServicioSocial.Documentos.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function create()
    {
        $servicioDocumentos = ServicioDocumentos::all();

        return view('System.ServicioSocial.Documentos.create', compact('servicioDocumentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
     
            'nombre_documento' => 'required',
            'url_documento' => 'required|mimes:pdf'
        ]);


        $data = new ServicioDocumentos();
        $data->fill($request->all());
        if($request->file('url_documento')){
            $data->url_documento = $request->file('url_documento')->store('documentos', 'public');
        }
        $data->save();

        flash('Registro Agregado Correctamente')->success();
       return redirect(route('sistema.servicio-social.documentos.index'));  // aaaaaaa
    }

    public function edit($id)
    {
        $data = ServicioDocumentos::find($id);
        $servicioDocumentos = ServicioDocumentos::all();

        return view('System.ServicioSocial.Documentos.edit', compact('data', 'servicioDocumentos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_documento' => 'required',
            'url_documento' => 'required|mimes:pdf',
        ]);

        $data = ServicioDocumentos::find($id);
        $data->fill($request->all());
        if($request->file('url_documento') != '')
        {
            Storage::delete($data->url_documento);
            $data->url_documento = $request->file('url_documento')->store('documento', 'public');
        }
        $data->active = 0;
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.servicio-social.documentos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documentos = ServicioDocumentos::findOrFail($id);
        Storage::delete($documentos->url_documento);
        $documentos->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.servicio-social.documentos.index'));
    }

    public function approve($id)
    {   
        $publicacion = ServicioDocumentos::findOrFail($id);
        $publicacion->active = 1;
        $publicacion->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.servicio-social.documentos.index'));
    }
}
