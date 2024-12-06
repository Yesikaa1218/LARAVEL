<?php

namespace App\Http\Controllers;

use App\Models\AnunciosCategorias;
use App\Models\User;
use App\Models\Materia;
use App\Models\PlanEstudios;
use App\Models\Empleado;
use App\Models\TipoExamen;
use App\Models\EmpleadoMateria;
use App\Models\CambioCalificacionesDato;
use App\Models\CambioCalificacionSolicitud;
use App\Models\FirmasSolicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class CalificacionesController extends Controller
{
    //--------------------------Views-----------------------------------------
    //Este metodo devuelve la pantalla que sirve para mostrar todas las solicitudes y filtros
     public function index()
    {
        $tipoExamen = TipoExamen::where('Activo',true)
                                ->get();
        $empleado = Auth::guard('empleado')->user();
        $rolCheck = "docente";
        return view('System.Calificaciones.index',compact('tipoExamen','empleado','rolCheck'));
    }

    
    public function formSolicitud()
    {
        $planes = PlanEstudios::where('active',true)
                                ->get();
        $usuario = Auth::user();
        $empleado = Auth::guard('empleado')->user();
        $tipoExamen = TipoExamen::where('Activo',true)
                                ->get();
    
        return view('System.Calificaciones.Docente.createSolicitud', compact('usuario','planes','empleado','tipoExamen'));
    }

    public function formCambioCalificacion(){
        $data = AnunciosCategorias::all();
        $usuarios = User::all();
        return view('System.Calificaciones.Docente.createCambioCalificaciones', compact('data', 'usuarios'));
    }

    public function indexCoordinador(){
        $empleado = Auth::guard('empleado')->user();
        $rolCheck = "coordinador";
        $estatusMostrar = "3"; 
        return view('System.Calificaciones.Coordinador.index',compact('empleado','rolCheck','estatusMostrar'));
    }

    public function indexEscolar(){
        $empleado = Auth::guard('empleado')->user();
        $rolCheck = "escolar";
        $estatusMostrar = "1"; 
        return view('System.Calificaciones.Coordinador.index',compact('empleado','rolCheck','estatusMostrar'));
    }

    public function indexSubAcademico(){
        $empleado = Auth::guard('empleado')->user();
        $rolCheck = "subacademico";
        $estatusMostrar = "4"; 
        return view('System.Calificaciones.Coordinador.index',compact('empleado','rolCheck','estatusMostrar'));
    }
    /*Vista index Coordinadores,Escolar,Subdirector academico */
    public function VerDetalleCoordinador($id){
        $empleado = Auth::guard('empleado')->user();
        $solicitudId=$id;
        $solicitud = CambioCalificacionSolicitud::find($id);
        $rolCheck = "coordinador";
        return view('System.Calificaciones.Coordinador.indexCambiosCalificacionesCoordinadores2',compact('solicitudId','rolCheck','solicitud','empleado'));
    }
    public function VerDetalleEscolar($id){
        $empleado = Auth::guard('empleado')->user();
        $solicitudId=$id;
        $rolCheck = "escolar";
        $solicitud = CambioCalificacionSolicitud::find($id);
        return view('System.Calificaciones.Coordinador.indexCambiosCalificacionesCoordinadores2',compact('solicitudId','rolCheck','solicitud','empleado'));
    }
    public function VerDetalleSubAcademico($id){
        $empleado = Auth::guard('empleado')->user();
        $solicitudId=$id;
        $rolCheck = "subacademico";
        $solicitud = CambioCalificacionSolicitud::find($id);
        return view('System.Calificaciones.Coordinador.indexCambiosCalificacionesCoordinadores2',compact('solicitudId','rolCheck','solicitud','empleado'));
    }

    public function indexDocente($solicitudId){
        $tipoExamen = TipoExamen::where('Activo',true)
        ->get();
        return view('System.Calificaciones.indexCambiosCalificaciones',compact('solicitudId','tipoExamen'));
    }

    //----------------------funcionalidad---------------------------------------
    //Docentes
//Ya actualizada para funcionar en las nuevas tablas
        public function indexMaterias(){
            $tipoExamen = TipoExamen::where('Activo',true)
                                ->get();
            $empleado = Auth::guard('empleado')->user();
            $rolCheck = "docente";
            // Obtener las materias y grupos del empleado
            $materias = DB::table('empleados_materias AS em')
            ->join('empleados AS e', 'em.fkEmpleado', '=', 'e.id')
            ->join('materias_cambios AS m', 'em.fkMateria', '=', 'm.id')
            ->join('plan_estudios_cambios AS p', 'm.plan_estudios_id', '=', 'p.id')
            ->join('grupos AS g', 'g.fkEmpMat', '=', 'em.id')
            ->where('e.id', $empleado->id)
            ->select(
                'm.clave AS clave_materia',
                'm.id AS id_materia',
                'm.nombre AS nombre_materia',
                'p.nombre AS nombre_plan_estudios',
                'p.id AS id_plan_estudios',
                'g.idGrupo AS id_grupo',
                'g.grupo AS grupo'
            )
            ->get();
            return view('System.Calificaciones.Docente.listaMateriasDocente',compact('tipoExamen','empleado','rolCheck', 'materias'));
        }

//Ya actualizada para funcionar en las nuevas tablas
public function indexAlumnos($idGrupo)
{
    $empleado = Auth::guard('empleado')->user();
    $rolCheck = "docente";
    
    // Alumnos libres (incluye aquellos sin solicitud o con estatus 7 u 8)
    $alumnos = DB::table('grupo_alumnos AS ga')
        ->join('alumnos AS a', 'ga.idAlumno', '=', 'a.id')
        ->join('tipo_examen AS te', 'ga.tipoExamen', '=', 'te.idTipoExamen')
        ->where('ga.idGrupo', $idGrupo)
        ->where(function ($query) {
            $query->whereNotExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                         ->from('cambio_calificaciones_datos AS ccd')
                         ->join('cambioscalificacionessolicitudes AS cs', 'ccd.fkSolicitud', '=', 'cs.idSolicitudCambio')
                         ->whereColumn('ccd.Matricula', 'a.matricula')
                         ->where('cs.Activo', 1)
                         ->whereNotIn('cs.Estatus', [7, 8]);
            })
            ->orWhereExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                         ->from('cambio_calificaciones_datos AS ccd')
                         ->join('cambioscalificacionessolicitudes AS cs', 'ccd.fkSolicitud', '=', 'cs.idSolicitudCambio')
                         ->whereColumn('ccd.Matricula', 'a.matricula')
                         ->whereIn('cs.Estatus', [7, 8])
                         ->where('cs.Activo', 1);
            });
        })
        ->select(
            'ga.idGrupo AS idGrupo',
            'ga.id AS id_grupo_alumnos',
            'ga.idAlumno AS id_alumno',
            'a.nombre AS nombre_alumno',
            'a.matricula AS matricula_alumno',
            'ga.oportunidad AS oportunidad',
            'te.Descripcion AS tipo_examen',
            'ga.calificacion AS calificacion'
        )
        ->get();

    // Alumnos en espera (estatus distinto de 6 u 7)
    $alumnosEnEspera = DB::table('grupo_alumnos AS ga')
        ->join('alumnos AS a', 'ga.idAlumno', '=', 'a.id')
        ->join('tipo_examen AS te', 'ga.tipoExamen', '=', 'te.idTipoExamen')
        ->join('cambio_calificaciones_datos AS ccd', 'a.matricula', '=', 'ccd.Matricula')
        ->join('cambioscalificacionessolicitudes AS cs', 'ccd.fkSolicitud', '=', 'cs.idSolicitudCambio')
        ->where('ga.idGrupo', $idGrupo)
        ->whereNotIn('cs.Estatus', [6, 7])
        ->where('cs.Activo', 1)
        ->select(
            'ga.idGrupo AS idGrupo',
            'ga.id AS id_grupo_alumnos',
            'ga.idAlumno AS id_alumno',
            'a.nombre AS nombre_alumno',
            'a.matricula AS matricula_alumno',
            'ga.oportunidad AS oportunidad',
            'te.Descripcion AS tipo_examen',
            'ga.calificacion AS calificacion',
            'cs.idSolicitudCambio AS idSolicitud',
            'cs.Estatus'
        )
        ->get();

    return view('System.Calificaciones.Docente.listaAlumnosDocente', compact('empleado', 'rolCheck', 'alumnos', 'alumnosEnEspera', 'idGrupo'));
}

        
        public function indexSolicitudAlumnos($idSolicitud)
        {
            // Obtener el grupo relacionado con la solicitud en la tabla cambioscalificacionessolicitudes
            $grupo = DB::table('cambioscalificacionessolicitudes')
                ->where('idSolicitudCambio', $idSolicitud)
                ->value('fkGrupo');
        
            // Obtener las matrículas de los alumnos que ya están en la tabla cambio_calificaciones_datos para esta solicitud y que están activos
            $matriculasExcluidas = DB::table('cambio_calificaciones_datos')
                ->where('fkSolicitud', $idSolicitud)
                ->where('Activo', 1) // Solo incluir aquellos que tienen Activo = 1
                ->pluck('Matricula') // Obtenemos solo las matrículas
                ->toArray();
        
            // Obtener los alumnos del grupo, excluyendo los que ya están en cambio_calificaciones_datos
            $alumnos = DB::table('grupo_alumnos AS ga')
                ->join('alumnos AS a', 'ga.idAlumno', '=', 'a.id')
                ->join('tipo_examen AS te', 'ga.tipoExamen', '=', 'te.idTipoExamen')
                ->where('ga.idGrupo', $grupo) // Filtrar por grupo
                ->whereNotIn('a.Matricula', $matriculasExcluidas) // Excluir los alumnos ya presentes en cambio_calificaciones_datos
                ->select(
                    'ga.idGrupo AS idGrupo',
                    'ga.id AS id_grupo_alumnos',
                    'ga.idAlumno AS id_alumno',
                    'a.Nombre AS nombre_alumno',
                    'a.Matricula AS matricula_alumno',
                    'ga.oportunidad AS oportunidad',
                    'te.Descripcion AS tipo_examen',
                    'ga.calificacion AS calificacion'
                )
                ->get();
        
            return response()->json([
                'alumnos' => $alumnos
            ]);
        }
        
        //Historial de Solicitudes
        //Funcion para ver los datos
        public function historialSolicitud($idSolicitud){
                
            $historial = DB::table('historialSolicitudes AS hs')
            ->join('empleados AS e', 'hs.idEmpleado', '=', 'e.id')
            ->join('model_has_roles AS mhr', 'e.id', '=', 'mhr.model_id')
            ->join('roles AS r', 'mhr.role_id', '=', 'r.id')
            ->where('hs.idSolicitud', $idSolicitud) // Filtrar por idSolicitud
            ->where('mhr.model_type', 'App\Models\Empleado') // Filtrar por model_type
            ->select(
                'hs.idSolicitud AS Solicitud',
                'e.NoEmpleado AS Clave',
                DB::raw('CONCAT(e.Nombre, " ", e.ApPaterno, " ", e.ApMaterno) AS Nombre'),
                'hs.accion AS Accion',
                'hs.fecha AS Fecha',
                'r.name AS Rol'
            )
            ->get();
                
                    return response()->json([
                        'historial' => $historial
                    ]);
        }
        
        //Funcion para agregar datos a la solicitud
        public function verMotivo($idSolicitud){
            $estatus = DB::table('cambioscalificacionessolicitudes')
                ->where('idSolicitudCambio', $idSolicitud)
                ->value('estatus');
            // Determinar el valor de "Rol" basado en el "estatus"
            $rol = '';
            if ($estatus >= 7 && $estatus <= 9) {
                switch ($estatus) {
                    case 8:
                        $rol = 'Escolar'; // Asigna el valor correspondiente
                    break;
                    case 9:
                        $rol = 'Coordinador'; // Asigna el valor correspondiente
                    break;
                    case 10:
                        $rol = 'Subdirector Académico'; // Asigna el valor correspondiente
                    break;
                }
            }

            $motivo = DB::table('comentariosSolicitud AS cs')
                ->join('empleados as e', 'cs.idEmpleado', '=', 'e.id')
                ->where('cs.idSolicitud', $idSolicitud)
                ->where('cs.activo','1')
                ->select(
                DB::raw('CONCAT(e.Nombre, " ", e.ApPaterno, " ", e.ApMaterno) AS Nombre'),
                'cs.comentario AS Comentario'
            )
            ->get();

            return response()->json(['motivo'=>$motivo, 'rol'=>$rol]);

        }

        //Ya actualizada para funcionar en las nuevas tablas
        public function indexSolicitud(Request $request) {
            $ids = $request->input('ids');
        
            // Array para almacenar los detalles de cada alumno y grupo
            $grupoInfo = [];
            $alumnos = [];
        
            foreach ($ids as $id) {
                $partes = explode(',', $id);
                $idAlumno = $partes[0];
                $idGrupo = $partes[1];
        
                // Obtener información del grupo
                $grupo = DB::table('grupo_alumnos')
                    ->join('grupos', 'grupo_alumnos.idGrupo', '=', 'grupos.idGrupo')
                    ->join('empleados_materias', 'grupos.fkEmpMat', '=', 'empleados_materias.id')
                    ->join('materias_cambios', 'empleados_materias.fkMateria', '=', 'materias_cambios.id')
                    ->join('plan_estudios_cambios', 'materias_cambios.plan_estudios_id', '=', 'plan_estudios_cambios.id')
                    ->where('grupo_alumnos.idAlumno', $idAlumno)
                    ->where('grupo_alumnos.idGrupo', $idGrupo)
                    ->select(
                        'grupo_alumnos.idGrupo as fkGrupo',
                        'grupo_alumnos.calificacion',
                        'grupos.grupo',
                        'materias_cambios.nombre as materia',
                        'materias_cambios.clave as clave',
                        'plan_estudios_cambios.nombre as plan',
                        'plan_estudios_cambios.id as fkPlan'
                    )
                    ->first();
        
                if ($grupo) {
                    $grupoInfo = [
                        'fkGrupo' => $grupo->fkGrupo,
                        'fkPlan' => $grupo->fkPlan,
                        'grupo' => $grupo->grupo,
                        'plan' => $grupo->plan,
                        'materia' => $grupo->materia,
                        'clave' => $grupo->clave
                    ];
        
                    // Obtener los datos de los alumnos y tipo de examen
                    $alumnos[] = DB::table('grupo_alumnos')
                        ->join('alumnos', 'grupo_alumnos.idAlumno', '=', 'alumnos.id')
                        ->join('tipo_examen', 'grupo_alumnos.tipoExamen', '=', 'tipo_examen.idTipoExamen') // Agregar join con tipo_examen
                        ->where('grupo_alumnos.idAlumno', $idAlumno)
                        ->where('grupo_alumnos.idGrupo', $idGrupo)
                        ->select(
                        'alumnos.nombre',
                        'alumnos.matricula',
                        'grupo_alumnos.calificacion',
                        'tipo_examen.idTipoExamen as tipoExamenId',
                        'tipo_examen.Descripcion as tipoExamen' // Seleccionar la descripción del tipo de examen
                    )
            ->first();
                }
            }
        
             // Contar la cantidad de alumnos
            $contadorAlumnos = count($alumnos);
            // Obtener información adicional si es necesario
            $empleado = Auth::guard('empleado')->user();
            $rolCheck = "docente";
        
            // Pasar los detalles a la vista
            return view('System.Calificaciones.Docente.createSolicitudAlumnos', compact('empleado', 'rolCheck', 'grupoInfo', 'alumnos', 'contadorAlumnos'));
        }
        

        //Ya actualizada para funcionar en las nuevas tablas
    public function dataindex(){
        $usuarioActual = Auth::guard('empleado')->user()->id;
        $resultado = DB::table('cambiosCalificacionesSolicitudes as cs')
                    ->select('cs.idSolicitudCambio as folio', 'cs.created_at as fecha', 'm.nombre as materia', 'pe.nombre as name', 'cs.Estatus',DB::raw('CountCambiosCalificacionBySolicitud(cs.idSolicitudCambio) as cantidad'))
                    ->join('grupos as g', 'g.idGrupo', '=', 'cs.fkGrupo')
                    ->join('empleados_materias as em', 'em.id', '=', 'g.fkEmpMat')
                    ->join('materias_cambios as m', 'm.id', '=', 'em.fkMateria')
                    ->join('plan_estudios_cambios as pe', 'pe.id', '=', 'm.plan_estudios_id')
                    ->where('em.fkEmpleado', $usuarioActual)
                    ->where('cs.Activo',1) 
                    ->get();
                    

        return response()->json($resultado);
    }

    //Actualizada pero falta revisar funcionalidad
    //Mostrar las enviadas
    public function dataindexFirma($Estatus){
        $resultado = DB::table('cambiosCalificacionesSolicitudes as cs')
                    ->select('cs.idSolicitudCambio as folio',DB::raw('concat(e.Nombre," ",e.ApPaterno," ",e.ApMaterno) as name'), 'cs.created_at as fecha', 'm.nombre as materia', 'pe.nombre as plan', 'cs.Estatus',DB::raw('CountCambiosCalificacionBySolicitud(cs.idSolicitudCambio) as cantidad'))
                    ->join('grupos as g', 'g.idGrupo', '=', 'cs.fkGrupo')
                    ->join('empleados_materias as em', 'em.id', '=', 'g.fkEmpMat')
                    ->join('empleados as e','e.id','=','em.fkEmpleado')
                    ->join('materias_cambios as m', 'm.id', '=', 'em.fkMateria')
                    ->join('plan_estudios_cambios as pe', 'pe.id', '=', 'm.plan_estudios_id')
                    ->where('cs.Activo',1) 
                    ->where('cs.Estatus','=',$Estatus) 
                    ->get();           

        return response()->json($resultado);
    }

    //Actualizada pero falta revisar funcionalidad
    public function dataindexFirmaByLicenciatura($Estatus, $licenciaturaId){
        $query = DB::table('cambiosCalificacionesSolicitudes as cs')
                    ->select('cs.idSolicitudCambio as folio', DB::raw('concat(e.Nombre," ",e.ApPaterno," ",e.ApMaterno) as name'), 'cs.created_at as fecha', 'm.nombre as materia', 'pe.nombre as plan', 'cs.Estatus', DB::raw('CountCambiosCalificacionBySolicitud(cs.idSolicitudCambio) as cantidad'))
                    ->join('grupos as g', 'g.idGrupo', '=', 'cs.fkGrupo')
                    ->join('empleados_materias as em', 'em.id', '=', 'g.fkEmpMat')
                    ->join('empleados as e','e.id','=','em.fkEmpleado')
                    ->join('materias_cambios as m', 'm.id', '=', 'em.fkMateria')
                    ->join('plan_estudios_cambios as pe', 'pe.id', '=', 'm.plan_estudios_id')
                    ->where('cs.Activo', 1)
                    ->where('cs.Estatus', '=', $Estatus);
        //Esto no se ha actualizado, posible error.
        if ($licenciaturaId != 0) {
            $query->where('m.licenciatura_id', '=', $licenciaturaId);
        }
    
        $resultado = $query->get();
    
        return response()->json($resultado);
    }
    
    //Actualizado pero falta revisar error.
    public function dataindexEscolar(){
        $resultado = DB::table('cambiosCalificacionesSolicitudes as cs')
                    ->select('cs.idSolicitudCambio as folio',DB::raw('concat(e.Nombre," ",e.ApPaterno," ",e.ApMaterno) as name'), 'cs.created_at as fecha', 'm.nombre as materia', 'pe.nombre as plan', 'cs.Estatus',DB::raw('CountCambiosCalificacionBySolicitud(cs.idSolicitudCambio) as cantidad'))
                    ->join('grupos as g', 'g.idGrupo', '=', 'cs.fkGrupo')
                    ->join('empleados_materias as em', 'em.id', '=', 'g.fkEmpMat')
                    ->join('empleados as e','e.id','=','em.fkEmpleado')
                    ->join('materias_cambios as m', 'm.id', '=', 'em.fkMateria')
                    ->join('plan_estudios_cambios as pe', 'pe.id', '=', 'm.plan_estudios_id')
                    ->where('cs.Activo',1)
                    ->where('cs.Estatus','>',0)
                    ->get(); 

        return response()->json($resultado);
    }
    
//Actualizado falta comprobar
    public function getCambiosBySolicitud($id) {
        $resultado = CambioCalificacionesDato::select('cambio_calificaciones_datos.id as folio', 'cambio_calificaciones_datos.created_at as fecha', 'm.nombre as materia', 'pe.nombre as plan', 'cambio_calificaciones_datos.Motivo', 'cambio_calificaciones_datos.NombreAlumno')
            ->join('cambiosCalificacionesSolicitudes as cs', 'cs.idSolicitudCambio', '=', 'cambio_calificaciones_datos.fkSolicitud')
            ->join('grupos as g', 'g.idGrupo', '=', 'cs.fkGrupo')
            ->join('empleados_materias as em', 'em.id', '=', 'g.fkEmpMat')
            ->join('empleados as e', 'e.id', '=', 'em.fkEmpleado')
            ->join('materias_cambios as m', 'm.id', '=', 'em.fkMateria')
            ->join('plan_estudios_cambios as pe', 'pe.id', '=', 'm.plan_estudios_id')
            ->where('cs.idSolicitudCambio', $id)
            ->where('cambio_calificaciones_datos.Activo', 1)
            ->get();
    
        $cantidadRegistros = $resultado->count();
        return response()->json(['cantidad' => $cantidadRegistros, 'datos' => $resultado]);
    }
//Actualizado, falta comprobar
    public function getDatosDocumento($id){
        $resultado = CambioCalificacionesDato::select(
            'cambio_calificaciones_datos.id as idCambioDato',
            'cambio_calificaciones_datos.created_at as fechaCambioDato',
            'cambiosCalificacionesSolicitudes.idSolicitudCambio',
            'cambiosCalificacionesSolicitudes.Estatus as EstatusSolicitud',
            'cambiosCalificacionesSolicitudes.created_at as fechaSolicitud',
            DB::raw("CONCAT(ee.Nombre,' ',ee.ApPaterno,' ',ee.ApMaterno) as nombre_escolar"),
            DB::raw("CONCAT(ed.Nombre,' ',ed.ApPaterno,' ',ed.ApMaterno) as nombre_docente"),
            DB::raw("CONCAT(ec.Nombre,' ',ec.ApPaterno,' ',ec.ApMaterno) as nombre_coordinador"),
            DB::raw("CONCAT(es.Nombre,' ',es.ApPaterno,' ',es.ApMaterno) as nombre_subacademico"),
            DB::raw("ee.Firma as firmaE"),
            DB::raw("ed.Firma as firmaD"),
            DB::raw("ec.Firma as firmaC"),
            DB::raw("es.Firma as firmaS"),
            'materias.nombre as materia',
            'materias.clave as Clave',
            'planes_de_estudios.nombre as plan',
            'cambio_calificaciones_datos.Motivo',
            'cambio_calificaciones_datos.NombreAlumno',
            'cambio_calificaciones_datos.Matricula',
            'tipo_examen.Descripcion as tipoExamen',
            'grupos.descripcion as grupo',
            'cambio_calificaciones_datos.CalifCorrecta as CalificacionCorrecta',
            'cambio_calificaciones_datos.CalifIncorrecta as CalificacionIncorrecta'
        )
        ->join('cambiosCalificacionesSolicitudes as cambiosCalificacionesSolicitudes', 'cambiosCalificacionesSolicitudes.idSolicitudCambio', '=', 'cambio_calificaciones_datos.fkSolicitud')
        ->join('grupos as grupos', 'grupos.idGrupo', '=', 'cambiosCalificacionesSolicitudes.fkGrupo')
        ->join('empleados_materias as empleados_materias', 'empleados_materias.id', '=', 'grupos.fkEmpMat')
        ->join('empleados as empleados', 'empleados.id', '=', 'empleados_materias.fkEmpleado')
        ->join('materias_cambios as materias', 'materias.id', '=', 'empleados_materias.fkMateria')
        ->join('plan_estudios_cambios as planes_de_estudios', 'planes_de_estudios.id', '=', 'materias.plan_estudios_id')
        ->join('tipo_examen as tipo_examen', 'tipo_examen.idTipoExamen', '=', 'cambio_calificaciones_datos.fkTipoExamen')
        ->leftJoin('FirmasSolicitud as FirmasSolicitud', 'FirmasSolicitud.solicitud_id', '=', 'cambiosCalificacionesSolicitudes.idSolicitudCambio')
        ->leftJoin('empleados as ee', 'ee.id', '=', 'FirmasSolicitud.firmaEscolar')
        ->leftJoin('empleados as ed', 'ed.id', '=', 'FirmasSolicitud.firmaDocente')
        ->leftJoin('empleados as ec', 'ec.id', '=', 'FirmasSolicitud.firmaCoordinador')
        ->leftJoin('empleados as es', 'es.id', '=', 'FirmasSolicitud.firmaSubAcademico')
        ->where('cambiosCalificacionesSolicitudes.idSolicitudCambio', $id)
        ->where('cambio_calificaciones_datos.Activo', 1)
        ->get();
        $cantidadRegistros = $resultado->count();
        return response()->json(['cantidad' => $cantidadRegistros, 'datos' => $resultado]);
    }

    public function getCambioById($id){
        $cambio = CambioCalificacionesDato::where('id',$id)
                                            ->get();
        return response()->json($cambio);
    }

    public function getFirmas($idSolicitud){
        $firmas = FirmasSolicitud::where('solicitud_id',$idSolicitud)
                                 ->first();
        return response()->json($firmas);
    }

    public function storeSolicitud(Request $request)//Guarda las solicitudes pero registrando al menos a 1
    {
        try {
            $formData = $request->input('data');
            $contador = 0;
            $mensaje = [];
            $formName = "";
            $solicitudId = 0;

            foreach ($formData as $formDataItem) {
                $formName = "Formulario {$contador}";
            
                $rules = [];
            
                if ($contador === 0) {
                    // Validación para el primer formulario (CambioCalificacionSolicitud)
                    $rules = [
                        'noEmpleado' => 'required',
                        'plan' => 'required|numeric',
                        'materia' => 'required',
                        'clave' => 'required',
                        'grupo' => 'required',
                    ];
                    $modelo = new CambioCalificacionSolicitud;
                } else {
                    $rules = [
                        "nombre{$contador}" => 'required',
                        "matricula{$contador}" => 'required',
                        "tipoExamen{$contador}" => 'required',
                        "calificacionCorrecta{$contador}" => 'required|numeric',
                        "calificacionIncorrecta{$contador}" => 'required|numeric',
                        "motivo{$contador}" => 'required',
                    ];
                    $modelo = new CambioCalificacionesDato;
                }
                
            
                $validator = Validator::make($formDataItem, $rules);
            
                if ($validator->fails()) {
                    // Si la validación falla, puedes manejar los errores aquí, si es necesario.
                    $errores = $validator->errors()->all();
                    $mensaje[$formName] = "Formulario {$formName} contiene errores: " . implode(', ', $errores);

                } else {
                    
                    // Si la validación es exitosa, continúa con el proceso de almacenamiento.
                    if($contador === 0){
                        $modelo->fkGrupo = $formDataItem['grupo'];
                        $modelo->fkPlan = $formDataItem['plan'];
                        $modelo->Estatus = 0;
                        $modelo->Activo= 1;
                    }else{
                        $modelo->fkSolicitud= $solicitudId;  // Aquí debes obtener el ID de la solicitud
                        $modelo->NombreAlumno = $formDataItem['nombre' . $contador];
                        $modelo->Matricula = $formDataItem['matricula' . $contador];
                        $modelo->fkTipoExamen= $formDataItem['tipoExamen' . $contador];
                        $modelo->CalifCorrecta= $formDataItem['calificacionCorrecta' . $contador];
                        $modelo->CalifIncorrecta= $formDataItem['calificacionIncorrecta' . $contador];
                        $modelo->Motivo = $formDataItem['motivo' . $contador];
                        $modelo->Activo = 1;
                    }
                    $modelo->save();

                    if ($contador === 0) {
                        $solicitudId = $modelo->getKey();
                        
                        //HistorialSolicitudes
                        $empleado = DB::table('empleados')->where('noEmpleado', $formDataItem['noEmpleado'])->first();
                        if ($empleado) {
                            DB::table('historialSolicitudes')->insert([
                                'idSolicitud' => $solicitudId,
                                'idEmpleado' => $empleado->id,
                                'accion' => "Creó la solicitud.",
                                'fecha' => now(),
                            ]);
                        }
                    }
                    
                    $mensaje[$formName] = "Formulario {$formName} registrado con éxito..."; 
                }
            
                $contador++;
            }

            return response()->json($mensaje, 200);
        } catch (\Exception $e) {
            // Registra la excepción para depuración con más detalles
            //Log::error("Error al procesar los datos: " . $e->getMessage() . "\n" . $e->getTraceAsString());

            // Devuelve una respuesta de error con mensaje específico
            return response()->json(['error' => 'Ocurrió un error al procesar los datos: ' . $e->getMessage()], 400);
        }
    }

    public function addAlumnoSolicitud(Request $request)
    {
        $formData = $request->json()->all();
    
        // Validar los datos del formulario
        $validator = Validator::make($formData, [
            'nombre' => 'required|string',
            'matricula' => 'required|string',
            'tipoExamen' => 'required|int',
            'calificacionCorrecta' => 'required|numeric',
            'calificacionIncorrecta' => 'required|numeric',
            'motivo' => 'required|string',
            'idSolicitud' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }
    
        // Crear una nueva instancia del modelo CambioCalificacion y asignar los valores
        $modelo = new CambioCalificacionesDato();
        $modelo->fkSolicitud = $formData['idSolicitud'];
        $modelo->NombreAlumno = $formData['nombre'];
        $modelo->Matricula = $formData['matricula'];
        $modelo->fkTipoExamen = $formData['tipoExamen'];
        $modelo->CalifCorrecta = $formData['calificacionCorrecta'];
        $modelo->CalifIncorrecta = $formData['calificacionIncorrecta'];
        $modelo->Motivo = $formData['motivo'];
        $modelo->Activo = 1;
    
        // Guardar el registro en la base de datos
        $modelo->save();
    
        return response()->json(['success' => true]);
    }

    public function updateAlumnoSolicitud(Request $request, $id){
        // Obtener los datos del formulario y validarlos
        $formData = $request->json()->all();

        $validator = Validator::make($formData, [
            'nombre' => 'required|string',
            'matricula' => 'required|string',
            'tipoExamen' => 'required|string',
            'calificacionCorrecta' => 'required|numeric',
            'calificacionIncorrecta' => 'required|numeric',
            'motivo' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        // Buscar el registro existente en la base de datos
        $modelo = CambioCalificacionesDato::find($id);

        if (!$modelo) {
            return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
        }

        // Actualizar los valores del modelo con los datos del formulario
        $modelo->NombreAlumno = $formData['nombre'];
        $modelo->Matricula = $formData['matricula'];
        $modelo->fkTipoExamen = $formData['tipoExamen'];
        $modelo->CalifCorrecta = $formData['calificacionCorrecta'];
        $modelo->CalifIncorrecta = $formData['calificacionIncorrecta'];
        $modelo->Motivo = $formData['motivo'];

        // Guardar los cambios en la base de datos
        $modelo->save();

        return response()->json(['success' => true]);

    }

    public function softDeleteAlumnoSolicitud($id)
    {
        //$modelo = CambioCalificacionesDato::find($id);
        $modelo = CambioCalificacionesDato::where('fkSolicitud', $id)->first();

        if ($modelo) {
            $modelo->Activo = 0;
            $modelo->save();
        }

        // Independientemente de si se encontró CambioCalificacionesDato, buscar y desactivar la solicitud relacionada
        $solicitud = CambioCalificacionSolicitud::where('idSolicitudCambio', $id)->first();

        if ($solicitud) {
            $solicitud->Activo = 0;
            $solicitud->save();
        }

        if ($modelo || $solicitud) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
        }
    }

    public function softDeleteAlumnoSolicitudIndividual($id)
    {
        // Ejecuta una consulta para actualizar el campo 'Activo' a 0
        $updated = DB::table('cambio_calificaciones_datos')
            ->where('id', $id)
            ->update(['Activo' => 0]);

        // Verifica si se actualizó algún registro
        if ($updated) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
        }
    }

    public function reactivarSolicitud($idSolicitud) {
        try {
            // Obtener el id del empleado autenticado
            $empleado = Auth::guard('empleado')->user()->id;
    
            // Iniciar una transacción
            \DB::beginTransaction();
    
            // Actualizar el estatus en cambioscalificacionessolicitudes
            $update = \DB::table('cambioscalificacionessolicitudes')
                ->where('idSolicitudCambio', $idSolicitud)
                ->update(['estatus' => 0]);
    
            // Insertar un registro en historialSolicitudes
            $insert = \DB::table('historialSolicitudes')->insert([
                'idSolicitud' => $idSolicitud,
                'idEmpleado' => $empleado,
                'accion' => 'Reactivó la solicitud.',
                'fecha' => now(),
            ]);
    
            // Verificar si el registro existe en firmassolicitud
        $firmas = \DB::table('firmassolicitud')->where('solicitud_id', $idSolicitud)->first();

        if ($firmas) {
            // Si existe, actualizar las columnas para vaciar su contenido
            $updateFirmas = \DB::table('firmassolicitud')
                ->where('solicitud_id', $idSolicitud)
                ->update([
                    'firmaEscolar' => null,
                    'firmaDocente' => null,
                    'firmaCoordinador' => null,
                    'firmaSubAcademico' => null,
                ]);
        } else {
            // Si no existe, podrías decidir no hacer nada o realizar otras acciones.
            $updateFirmas = true; // Asumir que fue exitoso, aunque no se actualizó nada
        }

        // Verificar si todas las acciones se realizaron correctamente
        if ($update && $insert && $updateFirmas) {
                // Confirmar la transacción
                \DB::commit();
                return response()->json(['success' => true, 'message' => 'Solicitud reactivada correctamente.']);
            } else {
                // Deshacer la transacción si alguna acción falló
                \DB::rollBack();
                return response()->json(['success' => false, 'message' => 'No se pudo realizar la operación.'], 500);
            }
    
        } catch (\Exception $e) {
            // Deshacer la transacción en caso de error
            \DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    

    public function comentarioSolicitud(Request $request, $idSolicitud) {
        $empleado = Auth::guard('empleado')->user()->id;
        $mensaje = $request->Comentario;
    
        try {
            // Verificar si hay registros con la misma idSolicitud y actualizar activo=0
            DB::table('comentariosSolicitud')
                ->where('idSolicitud', $idSolicitud)
                ->where('activo', 1) // Solo actualizar los que estén activos
                ->update(['activo' => 0]);
    
            // Insertar el nuevo comentario
            DB::table('comentariosSolicitud')->insert([
                'idSolicitud' => $idSolicitud,
                'idEmpleado' => $empleado,
                'comentario' => $mensaje,
                'activo' => 1
            ]);
    
            return response()->json(['success' => true, 'message' => 'Motivo guardado exitosamente.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    

     public function declinarSolicitud(Request $request, $id)
    {
        $request->validate([
            'TipoFirma' => 'required|string|in:escolar,coordinador,subacademico',
        ]);
    
        // Obtener el código de estatus correspondiente al tipo de firma
        switch ($request->input('TipoFirma')) {
            case 'escolar':
                $estatusRechazo = 8; // Código correspondiente al estado de "Rechazada por Escolar"
                break;
            case 'coordinador':
                $estatusRechazo = 9; // Código correspondiente al estado de "Rechazada por Coordinador"
                break;
            case 'subacademico':
                $estatusRechazo = 10; // Código correspondiente al estado de "Rechazada por Subdirector Academico"
                break;
            
            default:
                return response()->json(['success' => false, 'message' => 'Tipo de firma no reconocido'], 400);
        }
    
        try {
            $modelo = CambioCalificacionSolicitud::find($id);
    
            if (!$modelo) {
                return response()->json(['success' => false, 'message' => 'Solicitud no encontrada'], 404);
            }
    
            $modelo->Estatus = $estatusRechazo;
            $modelo->save();

            $empleado = Auth::guard('empleado')->user()->id;
            $mensaje = "Error";
            switch ($request->input('TipoFirma')) {
                case 'escolar':
                    $mensaje = "Escolar ha rechazado la solicitud.";
                    break;
                case 'coordinador':
                    $mensaje = "Coordinador ha rechazado la solicitud.";
                    break;
                case 'subacademico':
                    $mensaje = "Subdirector Académico ha rechazado la solicitud.";
                    break;               
                default:
                    return response()->json(['success' => false, 'message' => 'Tipo de firma no reconocido'], 400);
            }    
            DB::table('historialSolicitudes')->insert([
                'idSolicitud' => $id,
                'idEmpleado' => $empleado,
                'accion' => $mensaje,
                'fecha' => now(),
            ]);
    
            return response()->json(['success' => true, 'message' => 'Documento rechazado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    
    //Cambiar Estatus
    /* Estatus 0 no enviada, 1 Enviada a escolar, 2 Firmada por escolar, 3 Validacion por docente, 4 Firmada por Coordinador,5 firmada por Subdirector Academico, 6 Jefe Escolar Finaliza cambio de calificacion, 7 cambio calificacion finalizado, 8 Escolar Rechaza, 9 Coordinador Rechaza,10 Subdirector Academico Rechaza */
    public function CambiarEstatus(Request $request, $id){
        $Estatus = [0,1,2,3,4,5,6,7,8,9,10,];
        try {
            $modelo = CambioCalificacionSolicitud::find($id);
    
            if (!$modelo) {
                return response()->json(['success' => false, 'message' => 'Solicitud no encontrada'], 404);
            }
    
            // Validar que el valor de Estatus sea válido (ajústalo según tus necesidades)
            if (!in_array($request->Estatus,$Estatus)) {
                return response()->json(['success' => false, 'message' => 'Estatus no válido'], 400);
            }
    
            $modelo->Estatus = $request->Estatus;
            $modelo->save();
    
            $empleado = Auth::guard('empleado')->user()->id;
            $mensaje = "Error";
            switch($modelo->Estatus){
                case 1:
                    $mensaje = "Envió la solicitud a escolar.";
                    break;
                case 2:
                    $mensaje = "Firmó la solicitud como Escolar";
                    break;
                case 3:
                    $mensaje = "Firmó la solicitud como Docente.";
                    break;
                case 4:
                    $mensaje = "Firmó la solicitud como Coordinador.";
                    break;
                case 5:
                    $mensaje = "Firmó la solicitud como Subdirector Académico";
                    break;
                    case 6:
                        $mensaje = "Cerró la solicitud de forma satisfactoria.";
                        //NOTA NO USAR ACTIVO PARA ESTO, NECESITAS CREAR UNA NUEVA COLUMNA.
                        /*
                        DB::table('cambio_calificaciones_datos')
                            ->where('fkSolicitud', $id) // Asumiendo que este es el campo correspondiente
                            ->update(['Activo' => 0]);
                            
                        */
                        break;
                    case 7:
                        $mensaje = "Proceso finalizado.";
                        //NOTA NO USAR ACTIVO PARA ESTO, NECESITAS CREAR UNA NUEVA COLUMNA.
                        /*
                        DB::table('cambio_calificaciones_datos')
                            ->where('fkSolicitud', $id) // Asumiendo que este es el campo correspondiente
                            ->update(['Activo' => 0]);
                            
                        */

                        //NUEVA IDEA
                        /*
                            No necesitas crear una neuva columna ni cambiar el activo. Solo necesitas hacer una busqueda
                            En la busqueda debes revisar que el alumno no se encuentre en una solicitud que tenga
                            el mismo id de grupo del de la lista de alumnos/materias y que si llega a estar en una
                            solicitud de ese mismo idGrupo, que revise si la solicitud está en estatus 6 o 7, si esta en
                            esos estatus entonces si se puede seleccionar al alumno. Si no se enceuntra en esos entonces
                            bloquea al alumno y muestra la solicitud donde se enceuntra aun pendiente.
                        */
                        break;
                case 8:
                    $mensaje = "Escolar ha rechazado la solicitud.";
                    break;
                case 9:
                    $mensaje = "Coordinador ha rechazado la solicitud.";
                    break;
                case 10:
                    $mensaje = "Subdirector Académico ha rechazado la solicitud.";
                    break;
            }

            // Revisar y actualizar todos los registros en comentariosSolicitud
            if ($modelo->Estatus == 1) {
                DB::table('comentariosSolicitud')
                    ->where('idSolicitud', $modelo->idSolicitudCambio)
                    ->where('activo', 1) // Solo actualizar los que tengan activo=1
                    ->update(['activo' => 0]);
            }

            DB::table('historialSolicitudes')->insert([
                'idSolicitud' => $id,
                'idEmpleado' => $empleado,
                'accion' => $mensaje,
                'fecha' => now(),
            ]);


            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            // Manejar excepciones y devolver una respuesta de error detallada
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

}
