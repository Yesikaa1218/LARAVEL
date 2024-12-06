<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Semestres;

class SemestresController extends Controller
{
    public function index()
    {
        return view('System.Semestres.index');
    }

    public function dataindex()
    {
        return datatables(Semestres::all())
            ->addColumn('btn', 'System.Semestres.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create()
    {
        return view('System.Semestres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
        ]);

        $data = new Semestres();
        $data->fill($request->all());
        $data->save();

        flash('Registro Agregado Correctamente')->success();
        return redirect(route('sistema.semestres.index'));
    }

    public function edit(Request $request, $id)
    {
        $data = Semestres::find($id);
        return view('System.Semestres.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
        ]);

        $data = Semestres::find($id);
        $data->fill($request->all());
        $data->save();

        flash('Registro Editado Correctamente')->success();
        return redirect(route('sistema.semestres.index'));
    }

    public function destroy($id)
    {
        $semestre = Semestres::findOrFail($id);
        $semestre->delete();

        flash('Registro Eliminado Correctamente')->success();
        return redirect(route('sistema.semestres.index'));
    }

    public function approve($id)
    {
        $semestre = Semestres::findOrFail($id);
        $semestre->active = 1;
        $semestre->update();

        flash('Registro aprobado correctamente')->success();
        return redirect(route('sistema.semestres.index'));
    }

    public function semestreUpdateview()
    {
        return view('System.Semestres.update');
    }

    public function semestreUpdate($id) {
        // Obtiene el semestre por ID
        $semestre = Semestres::findOrFail($id);
    
        if ($semestre) {
            // Actualiza el semestre actual a seleccionado
            $semestre->seleccionado = 1;
            $semestre->save();
    
            // Desactiva todos los demás semestres
            Semestres::where('id', '!=', $id)->update(['seleccionado' => 0]);
    
            return redirect(route('sistema.semestres.index'));
        }
    
        return redirect(route('sistema.semestres.index')); // En caso de que no se encuentre el semestre con el ID proporcionado.
    }
    
}
