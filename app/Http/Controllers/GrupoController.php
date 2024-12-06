<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Grupo;

use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        return view('grupos.create');
    }

    public function store(Request $request)
    {
        // Validación de datos y creación de un nuevo grupo
    }

    public function show($id)
    {
        $grupo = Grupo::find($id);
        return view('grupos.show', compact('grupo'));
    }

    public function edit($id)
    {
        $grupo = Grupo::find($id);
        return view('grupos.edit', compact('grupo'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos y actualización del grupo
    }

    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        return redirect()->route('grupos.index');
    }

    public function getGruposByUser($materiaId){
        $userId = Auth::guard('empleado')->user()->id;
        $grupo = Grupo::join('empleados_materias as em', 'em.id', '=', 'grupos.fkEmpMat')
        ->where('em.fkEmpleado', $userId)
        ->where('em.fkMateria', $materiaId)
        ->select('grupos.idGrupo', 'grupos.descripcion', 'grupos.capacidad', 'em.fkEmpleado as idEmpleado', 'em.fkMateria as idMateria')
        ->get();
        return response()->json($grupo);
    }
}
