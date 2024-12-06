<?php

namespace App\Http\Controllers\Front;

use App\Models\AcreditacionesIndicadoresFacultad;
use App\Models\AcreditacionesIndicadoresLicenciaturas;
use App\Models\AcreditacionesIndicadoresPosgrado;
use App\Http\Controllers\Controller;
use App\Models\Licenciatura;
use App\Models\LicenciaturaCongreso;
use App\Models\Posgrado;
use App\Models\PosgradoCongreso;
use App\Models\UniversidadSaludable;
use App\Models\ActividadesCulturales;
use App\Models\AsuntosUniversitarios;
use App\Models\Anuncios;
use App\Models\AnunciosCategorias;
use App\Models\Beca;
use App\Models\Biblioteca;
use App\Models\ActividadesCulturalesClubes;
use App\Models\Asesorias;
use App\Models\Tutorias;
use App\Models\CalidadEducativa;
use App\Models\CalidadEducativaLicenciatura;
use App\Models\CalidadEducativaPosgrado;
use App\Models\CAADI;
use App\Models\EducacionContinua;
use App\Models\Emprendimiento;
use App\Models\Escolar;
use App\Models\EscolarPreguntasFecuentes;
use App\Models\EstrategiaDigital;
use App\Models\ExDirector;
use App\Models\FacultadInforme;
use App\Models\FacultadSeccion;
use App\Models\Internacionalizacion;
use App\Models\PracticaProfesional;
use App\Models\ProfesorEmerito;
use App\Models\ServicioSocial;
use App\Models\Sustentabilidad;
use App\Models\Tesoreria;
use App\Models\TesoreriaPreguntasFrecuentes;
use App\Models\NoticiasCategoria;
use App\Models\Deportivo;
use App\Models\Laboratorio;
use App\Models\TutoriasLaboratorio;
use App\Models\Linares;
use App\Models\LogrosPosgrado;
use App\Models\Materia;
use App\Models\Noticia;
use App\Models\PlanEstudios;
use App\Models\PosgradoProfesor;
use App\Models\SeccionLibrePosgrado;
use App\Models\ServicioPreguntasFrecuentes;
use App\Models\ServicioDocumentos;
use App\Models\SociedadAlumnos;
use App\Models\PracticasPreguntasFrecuentes;
use App\Models\GuiaEXEN;
use App\Models\GuiaNuevoIngreso;
use App\Models\PlanesEstudioPosgrado;
use App\Models\PeriodoAcademico;
use App\Models\Museo;
use App\Models\Observatorio;
use App\Models\DestiladoAgave;
use App\Models\Semestres;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Home o principal
    public function index(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $indicadores = AcreditacionesIndicadoresFacultad::all();
        // Obtener las últimas 3 noticias para mostrarlas en el inicio
        $noticias = Noticia::with('categoria') 
                    ->where('active', 1)
                    ->orderBy('created_at', 'desc')
                    ->limit(3)->get(); 
        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        $aviso = Anuncios::all()->where('mostrar_aviso', 1);
        $semestre = Semestres::where('seleccionado', 1)->first();

        return view('Front.home', compact('noticias', 'licenciaturas', 'posgrado', 'seccionesFacultad', 'indicadores', 'aviso','semestre'));
    }


    //Licenciaturas Paginas Estaticas
    public function licFisica(){
        return view('Front.Lics.fisica');
    }

    public function licLcc(){
        return view('Front.Lics.lcc');
    }

    public function licMultimedia(){
        return view('Front.Lics.multimedia');
    }

    public function licMatematicas(){
        return view('Front.Lics.matematicas');
    }

    public function licSeguridad(){
        return view('Front.Lics.seguridad');
    }
    
    public function licActuaria(){
        return view('Front.Lics.actuaria');
    }

    // Avisos
    public function avisos(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $categorias = AnunciosCategorias::all();
        $usuarios = Anuncios::with('usuario');
        $ultimosavisos = Anuncios::with('categoria')->where('active', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $data = Anuncios::with('categoria')->where('active', 1)->orderBy('created_at', 'desc')->paginate(2);

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();

        return view('Front.avisos', compact('data', 'licenciaturas', 'posgrado', 'categorias', 'usuarios', 'ultimosavisos', 'seccionesFacultad'));
    }

    public function avisosTag($tag){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $categorias = AnunciosCategorias::all();
        $usuarios = Anuncios::with('usuario');
        $ultimosavisos = Anuncios::with('categoria')->where('active', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $data = Anuncios::with('categoria')->where('aviso_categoria_id', $tag)
                                            ->where('active', 1)->orderBy('created_at', 'desc')->paginate(2);

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();

        return view('Front.avisos', compact('data', 'licenciaturas', 'posgrado', 'categorias', 'usuarios', 'ultimosavisos', 'seccionesFacultad'));
    }

     /**
     * Incrementa el contador de vistas de un anuncio específico.
     *
     * @param int $id El ID del anuncio del cual se debe incrementar el contador de vistas.
     * @return void
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Si el anuncio con el ID proporcionado no se encuentra.
     */
    public function contarViewsAviso($id){
        // Encuentra el anuncio con el ID dado
        $publicacion = Anuncios::findOrFail($id);
        // Incrementa el contador de vistas en 1
        $publicacion->contador += 1;
        // Guarda los cambios en la base de datos
        $publicacion->save();
    }

    // Mostrar el contenido de una sola aviso
    public function mostrarAviso($slug) {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Anuncios::with('categoria')->where('slug', $slug)->first();
        if($data){
            $id = $data->id;
            $this->contarViewsAviso($id);
        }

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();

        return view('Front.mostrarAviso', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }



    //Licenciaturas
    public function licenciatura($slug){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Licenciatura::where('slug', $slug)->first();
        // //$Unidades_Aprendizaje= Materia::where('active',1);
        // $planesEstudio = PlanEstudios::with('licenciatura.materias')->where('licenciatura_id',$data->id)->orderBy('licenciatura.materias.semestre_materia_lic', 'desc')->get();
        $pandos =  PlanEstudios::with(array('materias' => function($query) {
            $query->orderBy('semestre_materia_lic', 'ASC');
        }))->orderBy('name', 'asc')->where('licenciatura_id',$data->id)->get();


        $planesEstudio = PlanEstudios::with('materias')->where('licenciatura_id',$data->id)->get();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();

        $indicadores = AcreditacionesIndicadoresLicenciaturas::where('licenciatura_id', $data->id)->get();

        $semestre= Semestres::where('seleccionado', 1)->first();

        $mostrarSemestre = false;
        //$semestre = 0;
        
        //dd($pandos);
        return view('Front.licenciatura', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad', 'indicadores', 'planesEstudio','semestre'));
    }

    //Posgrados
    public function posgrados($slug){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Posgrado::where('slug', $slug)->first();
        $planesEstudioPosgrado = PlanesEstudioPosgrado::with('materias_posgrados')->where('posgrado_id',$data->id)->get();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();

        $indicadores = AcreditacionesIndicadoresPosgrado::where('posgrado_id', $data->id)->get();

        $mostrarPeriodo = false;
        $periodo = 0;
        
        return view('Front.posgrado', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad', 'indicadores', 'planesEstudioPosgrado'));
    }

    public function posgradosLogros(){

        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = PosgradoProfesor::where('active', 1)->orderBy('nombre_profesor')->get();
        
        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        return view('Front.posgrado-logro', compact('licenciaturas', 'posgrado', 'data', 'seccionesFacultad'));
    }
    public function posgradosSeccionLibre(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = PosgradoProfesor::where('active', 1)->orderBy('nombre_profesor')->get();
        $seccData = SeccionLibrePosgrado::where('active', 1)->paginate(2);

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        return view('Front.posgradoSeccionLibre', compact('licenciaturas', 'posgrado', 'data', 'seccionesFacultad','seccData'));
    }
    public function mostrarSeccionLibrePosgrado($id){
         
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = PosgradoProfesor::where('active', 1)->orderBy('nombre_profesor')->get();
        $ultimasnoticias = Noticia::with('categoria')->where('active', 1)->orderBy('created_at', 'desc')->take(5)->get();
        //$data = Noticia::with('categoria')->where('active', 1)->orderBy('created_at', 'desc')->paginate(2);
        $seccData = SeccionLibrePosgrado::with('posgrado')->where('active', 1)->where('posgrado_id',$id)->orderBy('created_at', 'desc')->paginate(2);
        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        //dd($data);
        return view('Front.posgradoSeccionLibre', compact('data', 'seccData','licenciaturas', 'posgrado', 'ultimasnoticias', 'seccionesFacultad'));
    }

    public function profesorLogros($slug) {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = PosgradoProfesor::where('id', $slug)
                                        ->where('active', 1)->first(); //cambiar 'id' por 'slug' */
      

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();

        $logrosData = LogrosPosgrado::where('posgrado_profesores_id', $data->id)
                                        ->where('active', 1)->get();

       return view('Front.profesorLogros', compact('data', 'logrosData', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    public function detalleSeccionLibre($id) {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = SeccionLibrePosgrado::where('id', $id)
                                        ->where('active', 1)->first(); //cambiar 'id' por 'slug' */
      

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();

       

       return view('Front.mostrarSeccionLibrePosgrado', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }
    //Becas
    public function becas(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Beca::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.becas', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Movilidad Estudiantil
    public function internacionalizacion(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Internacionalizacion::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.internacionalizacion', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Universidad saludable (Insalubre btw)
    public function universidadSaludable(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = UniversidadSaludable::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.universidadSaludable', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Asuntos Universitarios
    public function asuntosUniversitarios (){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = asuntosUniversitarios::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.asuntosUniversitarios', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }


    // Escolar
    public function escolar(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $preguntas = EscolarPreguntasFecuentes::where('active', 1)->get();
        $data = Escolar::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.escolar', compact('data', 'licenciaturas', 'posgrado', 'preguntas', 'seccionesFacultad'));
    }


    // Biblioteca
    public function biblioteca(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = biblioteca::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.biblioteca', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    //Educacion Continua
    public function educacioncontinua(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = EducacionContinua::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.EducacionContinua', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Emprendedores
    public function emprendedores(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Emprendimiento::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.emprendedores', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    //CAADI
    public function caadi(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = CAADI::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.caadi', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    //Calidad Educativa
    public function calidadEducativa(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = CalidadEducativa::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.calidadEducativa', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

      //Calidad Educativa Licenciatura
      public function calidadEducativaLicenciatura(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = calidadEducativaLicenciatura::where('active', 1)->latest()->first();
        

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.calidadEducativaLicenciatura', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

       //Calidad Educativa
    public function sociedadAlumnos(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = SociedadAlumnos::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.sociedadAlumnos', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

      //Calidad Educativa Posgrado
      public function calidadEducativaPosgrado(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = calidadEducativaPosgrado::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.calidadEducativaPosgrado', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Servicio Social
    public function servicioSocial(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $preguntas = ServicioPreguntasFrecuentes::where('active', 1)->get();
        $documentos =ServicioDocumentos::where('active',1)->get();
        $data = ServicioSocial::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.servicioSocial', compact('data', 'licenciaturas', 'preguntas', 'posgrado', 'seccionesFacultad','documentos'));
    }

    // Prácticas Profesionales
    public function practicasProfesionales(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $preguntas = PracticasPreguntasFrecuentes::where('active', 1)->get();
        $data = PracticaProfesional::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.practicasProfesionales', compact('data', 'licenciaturas', 'preguntas', 'posgrado', 'seccionesFacultad'));
    }

    // Guia EXEN
    public function guiaEXEN(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = GuiaEXEN::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.guiaEXEN', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    //Guia nuevo ingreso
    public function guiaNuevoIngreso(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = GuiaNuevoIngreso::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.guiaNuevoIngreso', compact( 'data','licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Sustentabilidad
    public function sustentabilidad(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = sustentabilidad::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.sustentabilidad', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Tesorería
    public function tesoreria(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Tesoreria::where('active', 1)->latest()->first();
        $preguntas =  TesoreriaPreguntasFrecuentes::where('active', 1)->get();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.tesoreria', compact('data', 'preguntas', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

     // Estrategia digital
     public function estrategiadigital(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = estrategiadigital::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.estrategiaDigital', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Actividades Culturales
    public function actividadesCulturales(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = ActividadesCulturales::where('active', 1)->latest()->first();
        $clubes = ActividadesCulturalesClubes::where('active', 1)->orderBy('name', 'asc')->get();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.actividadesCulturales', compact('data', 'clubes', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar un club cultural
    public function clubesCulturales($slug){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = ActividadesCulturalesClubes::where('slug', $slug)->where('active', 1)->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.clubCultural', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }
    
    // Tutorías
    public function tutorias(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Tutorias::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.tutorias', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

      // Asesorias
      public function asesorias(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Asesorias::where('active', 1)->latest()->first();
        $laboratorios = TutoriasLaboratorio::where('active', 1)->get();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.asesorias', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad', 'laboratorios'));
    }

    // Noticias
    public function noticias(request $request){
        $busqueda = $request->input('searchBar');
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $categorias = NoticiasCategoria::all();
        $ultimasnoticias = Noticia::with('categoria')->where('active', 1)->orderBy('created_at', 'desc')->take(5)->get();
        //$data = Noticia::with('categoria')->where('active', 1)->orderBy('created_at', 'desc')->paginate(2);
        $data = Noticia::with('categoria')->where('active', 1)->where('titulo', 'LIKE', '%'.$busqueda.'%')->orderBy('created_at', 'desc')->paginate(5);
        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        //dd($data);
        return view('Front.noticias', compact('data', 'licenciaturas', 'posgrado', 'categorias', 'ultimasnoticias', 'seccionesFacultad'));
    }

   

    public function noticiasCat($id){
         
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $categorias = NoticiasCategoria::all();
        $ultimasnoticias = Noticia::with('categoria')->where('active', 1)->orderBy('created_at', 'desc')->take(5)->get();
        //$data = Noticia::with('categoria')->where('active', 1)->orderBy('created_at', 'desc')->paginate(2);
        $data = Noticia::with('categoria')->where('active', 1)->where('noticia_categoria_id',$id)->orderBy('created_at', 'desc')->paginate(2);
        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        //dd($data);
        return view('Front.noticias', compact('data', 'licenciaturas', 'posgrado', 'categorias', 'ultimasnoticias', 'seccionesFacultad'));
    }

    /**
     * Incrementa el contador de vistas de un anuncio específico.
     *
     * @param int $id El ID de la noticia del cual se debe incrementar el contador de vistas.
     * @return void
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Si el anuncio con el ID proporcionado no se encuentra.
     */
    public function contarViewsNoticia($id){
        // Encuentra el anuncio con el ID dado
        $publicacion = Noticia::findOrFail($id);
        // Incrementa el contador de vistas en 1
        $publicacion->contador += 1;
        // Guarda los cambios en la base de datos
        $publicacion->save();
    }
   
    // Mostrar el contenido de una sola noticia
    public function mostrarNoticia($slug) {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Noticia::with('categoria')->where('slug', $slug)->first();
        if($data){
            $id = $data->id;
            $this->contarViewsNoticia($id);
        }

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.mostrarNoticia', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar alguna sección de Facultad 
    public function facultadSecciones($slug) {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = FacultadSeccion::where('slug', $slug)->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.facultadSeccion', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar la sección de informes de Facultad
    public function facultadInformes() {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = FacultadInforme::where('active', 1)->orderBy('title', 'desc')->get();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.facultadInformes', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar el contenido de un informe en específico
    public function facultadInforme($slug) {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = FacultadInforme::where('slug', $slug)->where('active', 1)->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.facultadInforme', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar la sección de ex directores
    public function exDirectores() {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = ExDirector::where('active', 1)->orderBy('fecha_final', 'asc')->get();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.exDirectores', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar la biografía de un ex director
    public function exDirector($slug) {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = ExDirector::where('slug', $slug)->where('active', 1)->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.exDirector', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar la sección de profesores eméritos
    public function profesoresEmeritos() {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = ProfesorEmerito::where('active', 1)->orderBy('name', 'desc')->get();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.profesoresEmeritos', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar la biografía de un profesor emérito
    public function profesorEmerito($slug) {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = ProfesorEmerito::where('slug', $slug)->where('active', 1)->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.profesorEmerito', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Deportivo
    public function deportivo(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Deportivo::where('active', 1)->latest()->first();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.deportivo', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Deportivo
    public function departamentoMultimedia(){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
       return view('Front.departamentoMultimedia', compact('licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar los congresos de licenciaturas
    public function congresosLicenciaturas(Request $request){
        $busqueda = $request->input('searchBar');
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $ultimosCongresosLicenciaturas = LicenciaturaCongreso::where('status', 1)->where('fecha_evento', '>=', \Carbon\Carbon::now())->orderBy('created_at', 'desc')->take(5)->get();
        $data = LicenciaturaCongreso::where('status', 1)->where('fecha_evento', '>=', \Carbon\Carbon::now())->where('name', 'LIKE', '%'.$busqueda.'%')->orderBy('created_at', 'desc')->paginate(2);
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.congresosLicenciaturas', compact( 'data', 'licenciaturas', 'posgrado', 'ultimosCongresosLicenciaturas', 'seccionesFacultad'));
    }

    public function congresosLicenciaturasRegistro($slug){
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = LicenciaturaCongreso::all()->where('slug', $slug)->first();
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.congresosLicenciaturasRegistro', compact( 'data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Mostrar los congresos de posgrados
    public function congresosPosgrados(Request $request){
        $busqueda = $request->input('searchBar');
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $ultimosCongresosPosgrados = PosgradoCongreso::where('status', 1)->where('fecha_evento', '>=', \Carbon\Carbon::now())->orderBy('created_at', 'desc')->take(5)->get();
        $data = PosgradoCongreso::where('status', 1)->where('fecha_evento', '>=', \Carbon\Carbon::now())->where('name', 'LIKE', '%'.$busqueda.'%')->orderBy('created_at', 'desc')->paginate(2);
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.congresosPosgrados', compact( 'data', 'licenciaturas', 'posgrado', 'ultimosCongresosPosgrados', 'seccionesFacultad'));
    }

    public function congresosPosgradoRegistro($slug){
        $posgrado = Posgrado::all();
        $licenciaturas = Licenciatura::all();
        $data = PosgradoCongreso::all()->where('slug', $slug)->first();
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.congresosPosgradoRegistro', compact( 'data', 'posgrado', 'licenciaturas',  'seccionesFacultad'));
    }

    public function unidadLinares(){
        $posgrado = Posgrado::all();
        $licenciaturas = Licenciatura::all();
        $data = Linares::where('active', 1)->latest()->first();
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.unidadLinares', compact( 'data', 'posgrado', 'licenciaturas',  'seccionesFacultad'));
    }

    public function museo() {
        $museo = Museo::all();
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $ultimasinfmuseo = Museo::where('active', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $data = Museo::where('active', 1)->orderBy('created_at', 'desc')->paginate(3);
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();

        return view('Front.museo', compact('data', 'ultimasinfmuseo', 'posgrado', 'licenciaturas', 'seccionesFacultad'));
    }

    public function mostrarMuseo($slug) {
        $data = Museo::where('slug', $slug)->first();
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        return view('Front.mostrarMuseo', compact('data', 'licenciaturas', 'posgrado' ,'seccionesFacultad'));
    }

    public function observatorio() {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = Observatorio::where('active', 1)->latest()->first();

        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.observatorio', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    public function destilado() {
        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();
        $data = DestiladoAgave::where('active', 1)->latest()->first();

        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        
        return view('Front.destilado', compact('data', 'licenciaturas', 'posgrado', 'seccionesFacultad'));
    }

    // Calendario
    public function calendario(){

        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        

        $month = date("Y-m");
        $data = $this->calendar_month($month);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];

        return view("Front.calendario",[
            'data' => $data,
            'mes' => $mes,
            'mespanish' => $mespanish,
            'licenciaturas' => $licenciaturas,
            'posgrado' => $posgrado,
            'seccionesFacultad' => $seccionesFacultad
        ]);

    }

    public function index_month($month){

        $licenciaturas = Licenciatura::all();
        $posgrado = Posgrado::all();

        // Obtener todas las secciones para mostrarlas en el submenú desplegable de Facultad
        $seccionesFacultad = FacultadSeccion::where('active', 1)->orderBy('title', 'asc')->get();
        

        $data = $this->calendar_month($month);
        $mes = $data['month'];

        // Obtener el mes en español
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];

        return view("Front.calendario",[
            'data' => $data,
            'mes' => $mes,
            'mespanish' => $mespanish,
            'licenciaturas' => $licenciaturas,
            'posgrado' => $posgrado,
            'seccionesFacultad' => $seccionesFacultad
        ]);

    }

    public static function calendar_month($month){
        //$mes = date("Y-m");
        $mes = $month;
        //sacar el ultimo de dia del mes
        $daylast =  date("Y-m-d", strtotime("last day of ".$mes));
        //sacar el dia de dia del mes
        $fecha      =  date("Y-m-d", strtotime("first day of ".$mes));
        $daysmonth  =  date("d", strtotime($fecha));
        $montmonth  =  date("m", strtotime($fecha));
        $yearmonth  =  date("Y", strtotime($fecha));
        // sacar el lunes de la primera semana
        $nuevaFecha = mktime(0,0,0,$montmonth,$daysmonth,$yearmonth);
        $diaDeLaSemana = date("w", $nuevaFecha);
        $nuevaFecha = $nuevaFecha - ($diaDeLaSemana*24*3600); //Restar los segundos totales de los dias transcurridos de la semana
        $dateini = date ("Y-m-d",$nuevaFecha);
        //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
        // numero de primer semana del mes
        $semana1 = date("W",strtotime($fecha));
        // numero de ultima semana del mes
        $semana2 = date("W",strtotime($daylast));
        // semana todal del mes
        // en caso si es enero
        if (date("m", strtotime($mes))==1) {
            $semana = 6;
        }
        else {
            $semana = ($semana2-$semana1)+1;
        }
        // semana todal del mes
        $datafecha = $dateini;
        $calendario = array();
        $iweek = 0;
        while ($iweek < $semana):
            $iweek++;

            $weekdata = [];
            for ($iday=0; $iday < 7 ; $iday++){

                $datafecha = date("Y-m-d",strtotime($datafecha."+ 1 day"));
                $datanew['mes'] = date("M", strtotime($datafecha));
                $datanew['dia'] = date("d", strtotime($datafecha));
                $datanew['fecha'] = $datafecha;

                //AGREGAR FECHAS DE INICIO Y FINAL DEL AVISO

                $anuncioInicio = Anuncios::with('categoria')->where("fecha_inicio", $datafecha)->get();
                $anuncioFinal = Anuncios::with('categoria')->where("fehca_final", $datafecha)->get();

                $datanew['avisos_inicio'] = $anuncioInicio;
                $datanew['avisos_final'] = $anuncioFinal;

                array_push($weekdata,$datanew);
            }

            $dataweek['semana'] = $iweek;
            $dataweek['datos'] = $weekdata;
            //$datafecha['horario'] = $datahorario;

            array_push($calendario,$dataweek);

        endwhile;

        $nextmonth = date("Y-M",strtotime($mes."+ 1 month"));
        $lastmonth = date("Y-M",strtotime($mes."- 1 month"));
        $month = date("M",strtotime($mes));
        $yearmonth = date("Y",strtotime($mes));
        //$month = date("M",strtotime("2019-03"));
        $data = array(
            'next' => $nextmonth,
            'month'=> $month,
            'year' => $yearmonth,
            'last' => $lastmonth,
            'calendar' => $calendario,
        );

        return $data;
    }

    public static function spanish_month($month)
    {

        $mes = $month;
        if ($month=="Jan") {
            $mes = "Enero";
        }
        elseif ($month=="Feb")  {
            $mes = "Febrero";
        }
        elseif ($month=="Mar")  {
            $mes = "Marzo";
        }
        elseif ($month=="Apr") {
            $mes = "Abril";
        }
        elseif ($month=="May") {
            $mes = "Mayo";
        }
        elseif ($month=="Jun") {
            $mes = "Junio";
        }
        elseif ($month=="Jul") {
            $mes = "Julio";
        }
        elseif ($month=="Aug") {
            $mes = "Agosto";
        }
        elseif ($month=="Sep") {
            $mes = "Septiembre";
        }
        elseif ($month=="Oct") {
            $mes = "Octubre";
        }
        elseif ($month=="Nov") {
            $mes = "Noviembre";
        }
        elseif ($month=="Dec") {
            $mes = "Diciembre";
        }
        else {
            $mes = $month;
        }

        return $mes;
    }

}
