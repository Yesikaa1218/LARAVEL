<?php

use App\Http\Controllers\LicenciaturaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LaboratorioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','App\Http\Controllers\Front\HomeController@index')->name('index');

Route::get('avisoss', 'App\Http\Controllers\Front\HomeController@avisos')->name('avisos.show');//se cambio el nombre de la liga a avisoss momentaneamente porque no me dejaba acceder con avisos
Route::get('avisos/{tag}/categoria', 'App\Http\Controllers\Front\HomeController@avisosTag')->name('avisos.tag.show');
Route::get('avisos/{slug}', 'App\Http\Controllers\Front\HomeController@mostrarAviso')->name('avisos.mostrar-aviso');

Route::get('licenciatura/{slug}', 'App\Http\Controllers\Front\HomeController@licenciatura')->name('licenciatura.show');

Route::get('posgrados/{slug}', 'App\Http\Controllers\Front\HomeController@posgrados')->name('posgrados.show');

Route::get('/posgrados/test/logros-posgrados', 'App\Http\Controllers\Front\HomeController@posgradosLogros')->name('posgrados.logros');
Route::get('/posgrados/test/seccion-libre', 'App\Http\Controllers\Front\HomeController@posgradosSeccionLibre')->name('posgrados.seccionLibre.show');
Route::get('posgrados/test/seccion-libre/{id}/posgrado', 'App\Http\Controllers\Front\HomeController@mostrarSeccionLibrePosgrado')->name('posgrados.mostrar-por-posgrados');
Route::get('facultad/seccion-libre/{id}', 'App\Http\Controllers\Front\HomeController@detalleSeccionLibre')->name('posgrados.detalle-seccion-libre.show');
Route::get('facultad/logros-posgrados/{slug}', 'App\Http\Controllers\Front\HomeController@profesorLogros')->name('posgrados.profesor-logro.show');


Route::get('universidad-saludable', 'App\Http\Controllers\Front\HomeController@universidadSaludable')->name('universidadsaludable.show');

Route::get('actividades-culturales', 'App\Http\Controllers\Front\HomeController@actividadesCulturales')->name('actividadesculturales.show');

Route::get('actividades-culturales/clubes-culturales/{slug}', 'App\Http\Controllers\Front\HomeController@clubesCulturales')->name('clubes-culturales.show');

Route::get('asuntos-universitarios', 'App\Http\Controllers\Front\HomeController@asuntosUniversitarios')->name('asuntosuniversitarios.show');

Route::get('emprendedores', 'App\Http\Controllers\Front\HomeController@emprendedores')->name('emprendedores.show');

Route::get('movilidad-estudiantil', 'App\Http\Controllers\Front\HomeController@internacionalizacion')->name('internacionalizacion.show');

Route::get('escolar', 'App\Http\Controllers\Front\HomeController@escolar')->name('escolar.show');

Route::get('becas', 'App\Http\Controllers\Front\HomeController@becas')->name('becas.show');

Route::get('calendario', 'App\Http\Controllers\Front\HomeController@calendario')->name('calendario.show');

Route::get('biblioteca', 'App\Http\Controllers\Front\HomeController@biblioteca')->name('biblioteca.show');

Route::get('sustentabilidad', 'App\Http\Controllers\Front\HomeController@sustentabilidad')->name('sustentabilidad.show');

Route::get('servicio-social', 'App\Http\Controllers\Front\HomeController@servicioSocial')->name('servicio-social.show');
Route::get('servicio-social-preguntas', 'App\Http\Controllers\Front\HomeController@servicioSocialPreguntas')->name('servicio-social-preguntas.show');

Route::get('practicas-profesionales', 'App\Http\Controllers\Front\HomeController@practicasProfesionales')->name('practicas-profesionales.show');
Route::get('practicas-profesionales-preguntas', 'App\Http\Controllers\Front\HomeController@practicasProfesionalesPreguntas')->name('practicas-profesionales-preguntas.show');

Route::get('guia-exens', 'App\Http\Controllers\Front\HomeController@guiaEXEN')->name('guia-exens.show');

Route::get('guianingreso', 'App\Http\Controllers\Front\HomeController@guiaNuevoIngreso')->name('guia-nuevo-ingreso.show');

Route::get('caadi', 'App\Http\Controllers\Front\HomeController@caadi')->name('caadi.show');

Route::get('calidad-educativa', 'App\Http\Controllers\Front\HomeController@calidadEducativa')->name('calidadeducativa.show');

Route::get('calendario/{mes}','App\Http\Controllers\Front\HomeController@index_month')->name('calendario.showMonth');

Route::get('estrategiadigital', 'App\Http\Controllers\Front\HomeController@estrategiadigital')->name('estrategiadigital.show');

Route::get('asesorias', 'App\Http\Controllers\Front\HomeController@asesorias')->name('asesorias.show');

Route::get('tutorias', 'App\Http\Controllers\Front\HomeController@tutorias')->name('tutorias.show');

Route::get('deportivo', 'App\Http\Controllers\Front\HomeController@deportivo')->name('deportivo.show');

Route::get('educacioncontinua', 'App\Http\Controllers\Front\HomeController@educacioncontinua')->name('educacioncontinua.show');

Route::get('facultad', 'App\Http\Controllers\Front\HomeController@facultad')->name('facultad.show');

Route::get('facultad/informes', 'App\Http\Controllers\Front\HomeController@facultadInformes')->name('facultad.informes');

Route::get('facultad/informes/{slug}', 'App\Http\Controllers\Front\HomeController@facultadInforme')->name('facultad.informes.show');

Route::get('facultad/ex-directores', 'App\Http\Controllers\Front\HomeController@exDirectores')->name('facultad.ex-directores');

Route::get('facultad/ex-directores/{slug}', 'App\Http\Controllers\Front\HomeController@exDirector')->name('facultad.ex-directores.show');

Route::get('facultad/profesores-emeritos', 'App\Http\Controllers\Front\HomeController@profesoresEmeritos')->name('facultad.profesores-emeritos');

Route::get('facultad/profesores-emeritos/{slug}', 'App\Http\Controllers\Front\HomeController@profesorEmerito')->name('facultad.profesores-emeritos.show');

Route::get('facultad/{slug}', 'App\Http\Controllers\Front\HomeController@facultadSecciones')->name('facultad.secciones');

// Route::get('departamento-multimedia', 'App\Http\Controllers\Front\HomeController@departamentoMultimedia')->name('departamento-multimedia');

Route::get('sociedad-alumnos', 'App\Http\Controllers\Front\HomeController@sociedadAlumnos')->name('sociedad-alumnos');

Route::get('tesoreria', 'App\Http\Controllers\Front\HomeController@tesoreria')->name('tesoreria.show');

Route::get('unidad-linares', 'App\Http\Controllers\Front\HomeController@unidadLinares')->name('unidadlinares.show');

Route::get('noticias', 'App\Http\Controllers\Front\HomeController@noticias')->name('noticias.show');
Route::get('noticias/{id}/categoria', 'App\Http\Controllers\Front\HomeController@noticiasCat')->name('noticias.mostrar-por-categoria');
Route::get('noticias/{slug}', 'App\Http\Controllers\Front\HomeController@mostrarNoticia')->name('noticias.mostrar-noticia');

Route::post('congresos-user/registerPosgrado', 'App\Http\Controllers\Front\CongresosUsersController@registerPosgrado')->name('congresos.users.registerPosgrado');
Route::post('congresos-user/registerLicenciatura', 'App\Http\Controllers\Front\CongresosUsersController@registerLicenciatura')->name('congresos.users.registerLicenciatura');
Route::post('congresos-user/store', 'App\Http\Controllers\Front\CongresosUsersController@store')->name('congresos.users.store');
Route::post('congresos-user/storePosgrado', 'App\Http\Controllers\Front\CongresosUsersController@storePosgrado')->name('congresos.users.storePosgrado');
Route::post('congresos-user/validate', 'App\Http\Controllers\Front\CongresosUsersController@emailValidation')->name('congresos.users.validate');

Route::get('congresos-licenciaturas', 'App\Http\Controllers\Front\HomeController@congresosLicenciaturas')->name('congreso.licenciatura');
Route::get('congresos-licenciaturas/{slug}/registrar', 'App\Http\Controllers\Front\HomeController@congresosLicenciaturasRegistro')->name('congreso.licenciatura.registrar');

Route::get('congresos-posgrados', 'App\Http\Controllers\Front\HomeController@congresosPosgrados')->name('congreso.posgrado');
Route::get('congresos-posgrados/{slug}/registrar', 'App\Http\Controllers\Front\HomeController@congresosPosgradoRegistro')->name('congreso.posgrado.registrar');


Route::get('multimedia-licenciatura', 'App\Http\Controllers\Front\HomeController@licMultimedia')->name('lics.multimedia');
Route::get('lcc-licenciatura', 'App\Http\Controllers\Front\HomeController@licLcc')->name('lics.lcc');
Route::get('fisica-licenciatura', 'App\Http\Controllers\Front\HomeController@licFisica')->name('lics.fisica');
Route::get('seguridad-licenciatura', 'App\Http\Controllers\Front\HomeController@licSeguridad')->name('lics.seguridad');
Route::get('actuaria-licenciatura', 'App\Http\Controllers\Front\HomeController@licActuaria')->name('lics.actuaria');
Route::get('matematicas-licenciatura', 'App\Http\Controllers\Front\HomeController@licMatematicas')->name('lics.matematicas');

Route::get('museo', 'App\Http\Controllers\Front\HomeController@museo')->name('museo.show');
Route::get('museo/{slug}', 'App\Http\Controllers\Front\HomeController@mostrarMuseo')->name('museo.mostrar-museo');

Route::get('observatorio','App\Http\Controllers\Front\HomeController@observatorio')->name('observatorio.show');
Route::get('destilado', 'App\Http\Controllers\Front\HomeController@destilado')->name('destilado.show');

Auth::routes(['register' => false]);

Route::get('home', function () {
    return redirect(route('sistema.home'));
});

Route::get('SistemaEscolar/home', function () {
    return redirect(route('sistema.homeEscolar'));
});

Route::get('post-all', function (){

    // All published posts
    $posts = \Corcel\Model\Post::all();
   //$posts = \Corcel\Model\Post::type('licenciaturas')->status('publish')->get();
   //$posts = \Corcel\Model\Post::type('anuncios')->get();

// A specific post
    return $posts;
});




Route::middleware(['auth'])->prefix('sistema')->name('sistema.')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('roles')->name('roles.')->group(function (){
        /* Roles PermissionController*/
        Route::get('index','App\Http\Controllers\RolController@indexRoles')->name('index');
        Route::get('create','App\Http\Controllers\RolController@createRoles')->name('create');
        Route::put('store','App\Http\Controllers\RolController@sotreRoles')->name('store');
        Route::delete('delete','App\Http\Controllers\RolController@deleteRoles')->name('delete');
        Route::get('data','App\Http\Controllers\RolController@dataRoles')->name('data');
        Route::get('edit/{id}', 'App\Http\Controllers\RolController@edit')->name('edit');
        Route::patch('update', 'App\Http\Controllers\RolController@updateRoles')->name('update');

        /* Permisos */
        Route::get('permisos/index','App\Http\Controllers\PermisoController@index')->name('permisos.index');
        Route::get('permisos/create','App\Http\Controllers\PermisoController@create')->name('permisos.create');
        Route::put('permisos/store','App\Http\Controllers\PermisoController@sotre')->name('permisos.store');
        Route::delete('permisos/delete','App\Http\Controllers\PermisoController@delete')->name('permisos.delete');
        Route::get('permisos/data','App\Http\Controllers\PermisoController@data')->name('permisos.data');
        Route::get('permisos/edit/{id}', 'App\Http\Controllers\PermisoController@edit')->name('permisos.edit');
        Route::patch('permisos/update', 'App\Http\Controllers\PermisoController@update')->name('permisos.update');
    });

    Route::prefix('user')->name('user.')->group(function (){
        Route::get('perfil', 'App\Http\Controllers\UserController@edit')->name('perfil');
        Route::put('perfil/{id}', 'App\Http\Controllers\UserController@update')->name('perfil.update');
        //Administradores
            Route::resource('administrador', 'App\Http\Controllers\AdministradoresController', ['except' => ['show']]);
            Route::get('administrador/data', 'App\Http\Controllers\AdministradoresController@dataindex')->name('administrador.data');
    });


    // Upload tiny images congresos
    Route::post('congresos/upload', 'App\Http\Controllers\LicenciaturaCongresoController@uploadTinyImage')->name('congresos.upload');

    Route::prefix('licenciaturas')->name('licenciaturas.')->group(function(){

         
        // Licenciaturas
        Route::get('licenciatura/data', 'App\Http\Controllers\LicenciaturaController@dataindex')->name('licenciatura.data');
        Route::resource('licenciatura', 'App\Http\Controllers\LicenciaturaController')->names('licenciatura');  
        
        //Materias de licenciatura
        //Route::get('unidades-de-aprendizaje/data', 'App\Http\Controllers\MateriaController@dataindex')->name('materias.data');
        //Route::resource('unidades-de-aprendizaje', 'App\Http\Controllers\MateriaController')->names('materias');
        
        //Profesores de licenciatura
        Route::put('profesores/approve/{id}', 'App\Http\Controllers\LicenciaturaProfesorController@approve')->name('profesores.approve');
        Route::get('profesores/data', 'App\Http\Controllers\LicenciaturaProfesorController@dataindex')->name('profesores.data');
        Route::resource('profesores', 'App\Http\Controllers\LicenciaturaProfesorController')->names('profesores');

        // Planes de estudios
        Route::get('planes-de-estudios/data', 'App\Http\Controllers\PlanesLicenciaturasController@dataindex')->name('planes.data');
        Route::resource('planes-de-estudios', 'App\Http\Controllers\PlanesLicenciaturasController')->names('planes');
        

        // Unidades de aprendizaje 
        Route::get('planes-de-estudios/{planId}/unidades-de-aprendizaje/data', 'App\Http\Controllers\LicenciaturaMateriasController@dataindex')->name('materias.data');
        Route::resource('planes-de-estudios/{planId}/unidades-de-aprendizaje', 'App\Http\Controllers\LicenciaturaMateriasController', ['except' => ['edit', 'update', 'delete']])->names('materias');
        Route::get('planes-de-estudios/{planId}/unidades-de-aprendizaje/{id}/edit', 'App\Http\Controllers\LicenciaturaMateriasController@edit')->name('materias.edit');
        Route::patch('planes-de-estudios/{planId}/unidades-de-aprendizaje/{id}/update', 'App\Http\Controllers\LicenciaturaMateriasController@update')->name('materias.update');
        Route::delete('planes-de-estudios/{planId}/unidades-de-aprendizaje/{id}/destroy', 'App\Http\Controllers\LicenciaturaMateriasController@destroy')->name('materias.destroy');

        Route::get('planes-de-estudios/{planId}/export/unidades-de-aprendizaje', 'App\Http\Controllers\LicenciaturaMateriasController@export')->name('materias.export');
        Route::get('planes-de-estudios/{planId}/import/unidades-de-aprendizaje', 'App\Http\Controllers\LicenciaturaMateriasController@import')->name('materias.import');
        Route::post('planes-de-estudios/{planId}/import/unidades-de-aprendizaje', 'App\Http\Controllers\LicenciaturaMateriasController@importUpload')->name('materias.upload');
        Route::get('plantilla', 'App\Http\Controllers\LicenciaturaMateriasController@import')->name('materias.plantilla');
        Route::get('import-download', 'App\Http\Controllers\LicenciaturaMateriasController@download')->name('materias.download');

        // Route::prefix('planes/{licenciatura}/{slug}')->name('planes.')->group(function(){
        //     // Unidades de aprendizaje
        //     Route::get('unidades-de-aprendizaje/data', 'App\Http\Controllers\LicenciaturaMateriaController@dataindex')->names('materias.data');
        //     Route::resource('unidades-de-aprendizaje', 'App\Http\Controllers\LicenciaturaMateriaController')->names('materias');
        // });

        //Congresos
        Route::put('congresos/approve/{id}', 'App\Http\Controllers\LicenciaturaCongresoController@approve')->name('congresos.approve');
        Route::put('congresos/active/{id}', 'App\Http\Controllers\LicenciaturaCongresoController@active')->name('congresos.active');
        Route::get('congresos/data', 'App\Http\Controllers\LicenciaturaCongresoController@dataindex')->name('congresos.data');
        Route::resource('congresos', 'App\Http\Controllers\LicenciaturaCongresoController')->names('congresos');
    });


    Route::prefix('posgrados')->name('posgrados.')->group(function(){
        //Posgrados
        Route::get('posgrado/data', 'App\Http\Controllers\PosgradoController@dataindex')->name('posgrado.data');
        Route::resource('posgrado', 'App\Http\Controllers\PosgradoController');

        //Materias de posgrado
        Route::get('planes-de-estudios/{planId}/unidades-de-aprendizaje/data', 'App\Http\Controllers\MateriasPosgradoController@dataindex')->name('materias.data');

        //Route::get('unidades-de-aprendizaje/data', 'App\Http\Controllers\MateriasPosgradoController@dataindex')->name('materias.data');
        Route::resource('planes-de-estudios/{id}/unidades-de-aprendizaje', 'App\Http\Controllers\MateriasPosgradoController', ['except' => ['show']])->names('materias');
        //Profesores de posgrado
        Route::get('profesores/data', 'App\Http\Controllers\PosgradoProfesorController@dataindex')->name('profesores.data');
        Route::resource('profesores', 'App\Http\Controllers\PosgradoProfesorController')->names('profesores');
        Route::put('profesores/approve/{id}', 'App\Http\Controllers\PosgradoProfesorController@approve')->name('profesores.approve');

        //Congresos
        Route::put('congresos/approve/{id}', 'App\Http\Controllers\PosgradoCongresoController@approve')->name('congresos.approve');
        Route::put('congresos/active/{id}', 'App\Http\Controllers\PosgradoCongresoController@active')->name('congresos.active');
        Route::get('congresos/data', 'App\Http\Controllers\PosgradoCongresoController@dataindex')->name('congresos.data');
        Route::resource('congresos', 'App\Http\Controllers\PosgradoCongresoController')->names('congresos');

        Route::get('logros-posgrado/data', 'App\Http\Controllers\LogrosPosgradoController@dataindex')->name('logros-profesores.data');
        Route::resource('logros-posgrado', 'App\Http\Controllers\LogrosPosgradoController', ['except' => ['show']])->names('logros-profesores');
        Route::put('logros-posgrado/approve/{id}', 'App\Http\Controllers\LogrosPosgradoController@approve')->name('logros-profesores.approve');

        Route::resource('seccion-libre', 'App\Http\Controllers\SeccionLibrePosgradoController', ['except' => ['show']])->names('seccion-libre');
        Route::get('seccion-libre/data', 'App\Http\Controllers\SeccionLibrePosgradoController@dataindex')->name('seccion-libre.data');
        Route::put('seccion-libre/approve/{id}', 'App\Http\Controllers\SeccionLibrePosgradoController@approve')->name('seccion-libre.approve');
        //Posgrado Planes de estudios
        Route::resource('planes-estudio-posgrado','App\Http\Controllers\PlanesEstudiosPosgradoController', ['except' => ['show']])->names('planes-posgrado');
        Route::get('planes-estudio-posgrado/data','App\Http\Controllers\PlanesEstudiosPosgradoController@dataindex')->name('planes-posgrado.data');
        

    });

    //Congresos-Licenciaturas

    Route::get('congresos-licenciaturas/{id}', 'App\Http\Controllers\CongresoLicenciaturaController@index')->name('congresos-licenciaturas.index');
    Route::get('congresos-licenciaturas/data/{id}', 'App\Http\Controllers\CongresoLicenciaturaController@dataindex')->name('congresos-licenciaturas.data');

    //Congresos-Posgrado
    
    Route::get('congresos-posgrado/{id}', 'App\Http\Controllers\CongresosPosgradoController@index')->name('congresos-posgrado.index');
    Route::get('congresos-posgrado/data/{id}', 'App\Http\Controllers\CongresosPosgradoController@dataindex')->name('congresos-posgrado.data');

    //Congresos-Usuarios
    Route::get('congresos-usuarios', 'App\Http\Controllers\CongresosUsersController@index')->name('congresos-usuarios.index');
    Route::get('congresos-usuarios/data', 'App\Http\Controllers\CongresosUsersController@dataindex')->name('congresos-usuarios.data');
    


    // Actividades Culturales
    Route::resource('actividades-culturales', 'App\Http\Controllers\ActividadesCulturalesController', ['except' => ['show' ]])->names('actividades-culturales');
    Route::put('actividades-culturales/approve/{id}', 'App\Http\Controllers\ActividadesCulturalesController@approve')->name('actividades-culturales.approve');

    // Clubes de actividades culturales
    Route::resource('actividades-culturales/clubes', 'App\Http\Controllers\ActividadeCulturalesClubesController', ['except' => ['show']])->names('actividades-culturales.clubes');;
    Route::get('actividades-culturales/clubes/data', 'App\Http\Controllers\ActividadeCulturalesClubesController@dataindex')->name('actividades-culturales.clubes.data');
    Route::put('actividades-culturales/clubes/approve/{id}', 'App\Http\Controllers\ActividadeCulturalesClubesController@approve')->name('actividades-culturales.clubes.approve');
    //Route::post('actividades-culturales/clubes/upload', 'App\Http\Controllers\ActividadeCulturalesClubesController@uploadTinyImage')->name('actividades-culturales.clubes.upload');

    // Universidad Saludable
    Route::resource('universidad-saludable',  'App\Http\Controllers\UniversidadSaludableController', ['except' => ['show', 'create', 'edit', 'update']]);
    Route::put('universidadsaludable/approve/{id}', 'App\Http\Controllers\UniversidadSaludableController@approve')->name('universidadsaludable.approve');

    // Universidad Saludable - Eventos y conferencias
    Route::resource('universidad-saludable-eventos',  'App\Http\Controllers\UniversidadSaludableEventosController', ['except' => ['show', 'index']]);
    Route::get('universidad-saludable-eventos-data', 'App\Http\Controllers\UniversidadSaludableEventosController@dataindex')->name('universidad-saludable-eventos.data');
    Route::put('universidad-saludable-eventos/approve/{id}', 'App\Http\Controllers\UniversidadSaludableEventosController@approve')->name('universidad-saludable-eventos.approve');

    // Tutorías
    Route::resource('tutorias',  'App\Http\Controllers\TutoriasController', ['except' => ['show', 'create', 'edit', 'update']])->names('tutorias');
    Route::put('tutorias/approve/{id}', 'App\Http\Controllers\TutoriasController@approve')->name('tutorias.approve');

    Route::prefix('asesorias')->name('asesorias.')->group(function() {
        // Información
        Route::resource('informacion', 'App\Http\Controllers\AsesoriasController')->names('informacion');
        Route::put('informacion/approve/{id}', 'App\Http\Controllers\AsesoriasController@approve')->name('informacion.approve');

        // Laboratorios
        Route::get('laboratorios/data', 'App\Http\Controllers\TutoriasLaboratorioController@dataindex')->name('laboratorios.data');
        Route::resource('laboratorios', 'App\Http\Controllers\TutoriasLaboratorioController')->names('laboratorios');
        Route::put('laboratorios/approve/{id}', 'App\Http\Controllers\TutoriasLaboratorioController@approve')->name('laboratorios.approve');

        // Profesores
        Route::get('profesores/data', 'App\Http\Controllers\TutoriasProfesorController@dataindex')->name('profesores.data');
        Route::resource('profesores', 'App\Http\Controllers\TutoriasProfesorController')->names('profesores');
        Route::put('profesores/approve/{id}', 'App\Http\Controllers\TutoriasProfesorController@approve')->name('profesores.approve');
    });

    Route::prefix('laboratorio-matematicas')->name('laboratorio-matematicas.')->group(function() { 
        //Problemas 
        Route::get('problemaLaboratorio/data', 'App\Http\Controllers\ProblemasLaboratorioController@dataindex')->name('problemaLaboratorio.data');
        Route::resource('problemaLaboratorio', 'App\Http\Controllers\ProblemasLaboratorioController')->names('problemaLaboratorio');
        Route::get('problemaLaboratorio/problema/{id}', 'App\Http\Controllers\ProblemasLaboratorioController@fotoProblema')->name('problemaLaboratorio.fotoProblema');
        Route::get('problemaLaboratorio/getProblemsByType/{typeId}', 'App\Http\Controllers\ProblemasLaboratorioController@getProblemsByType')->name('problemaLaboratorio.getProblemsByType');
        Route::get('problemaLaboratorio/getProblemImage/{id}', 'App\Http\Controllers\ProblemasLaboratorioController@getProblemImage')->name('problemaLaboratorio.getProblemImage');

        
        //Laboratorio
        Route::get('examen/data', 'App\Http\Controllers\ExamenController@dataindex')->name('examen.data');
        Route::resource('examen', 'App\Http\Controllers\ExamenController')->names('examen');
        Route::put('examen/approve/{id}', 'App\Http\Controllers\ExamenController@approve')->name('examen.approve');
        Route::get('examen/{examenId}/problemaLaboratorio/{id}', 'App\Http\Controllers\LaboratorioInformacionController@problemaLaboratorio')->name('laboratorio-informacion.problemaLaboratorio');
        Route::post('/laboratorio/{laboratorioId}/guardar-configuracion', [LaboratorioController::class, 'guardarConfiguracion'])->name('laboratorio.guardarConfiguracion');
        Route::get('/laboratorio/{laboratorioId}/cargar-configuracion', [LaboratorioController::class, 'cargarConfiguracion'])->name('laboratorio.cargarConfiguracion');

        //Problema de laboratorio 
        Route::get('examen/{examenId}/problema-laboratorio-examen/pdf', 'App\Http\Controllers\ProblemaLaboratorioExamenController@imprimirExamen')->name('problemasLaboratorioExamen.pdf');

        Route::get('examen/{examenId}/laboratorio-informacion/data', 'App\Http\Controllers\LaboratorioInformacionController@dataindex')->name('laboratorio-informacion.data');
        Route::resource('examen/{examenId}/laboratorio-informacion', 'App\Http\Controllers\LaboratorioInformacionController', ['except' => ['edit', 'update', 'delete']])->names('laboratorio-informacion');
        Route::get('examen/{examenId}/laboratorio-informacion/{id}/edit', 'App\Http\Controllers\LaboratorioInformacionController@edit')->name('laboratorio-informacion.edit');
        Route::patch('examen/{examenId}/laboratorio-informacion/{id}/update', 'App\Http\Controllers\LaboratorioInformacionController@update')->name('laboratorio-informacion.update');
        Route::delete('examen/{examenId}/laboratorio-informacion/{id}/destroy', 'App\Http\Controllers\LaboratorioInformacionController@destroy')->name('laboratorio-informacion.destroy');

        //Materia laboratorio
        Route::get('materiaLaboratorio/data', 'App\Http\Controllers\MateriaLaboratorioController@dataindex')->name('materiaLaboratorio.data');
        Route::resource('materiaLaboratorio', 'App\Http\Controllers\MateriaLaboratorioController')->names('materiaLaboratorio');

        //Tema materia
        Route::get('temaMateria/data', 'App\Http\Controllers\TemaMateriaController@dataindex')->name('temaMateria.data');
        Route::resource('temaMateria', 'App\Http\Controllers\TemaMateriaController')->names('temaMateria');

        //Modificacion de laboratorios
        Route::post('/laboratorio/{laboratorioId}/guardar-configuracion', [LaboratorioController::class, 'guardarConfiguracion'])->name('laboratorio.guardarConfiguracion');
        Route::get('/laboratorio/{laboratorioId}/cargar-configuracion', [LaboratorioController::class, 'cargarConfiguracion'])->name('laboratorio.cargarConfiguracion');
    
    });

    // ******Esto ya no debería ser necesario******
    Route::prefix('asesorias')->name('asesorias.')->group(function(){
        Route::resource('asesoria', 'App\Http\Controllers\AsesoriasController')->names('asesoria');
        // //Laboratorios
        // Route::get('laboratorios/data', 'App\Http\Controllers\TutoriasLaboratorioController@dataindex')->name('laboratorios.data');
        // Route::resource('laboratorios', 'App\Http\Controllers\TutoriasLaboratorioController')->names('laboratorios');

        // //Profesores
        // Route::get('profesores/data', 'App\Http\Controllers\TutoriasProfesorController@dataindex')->name('profesores.data');
        // Route::resource('profesores', 'App\Http\Controllers\TutoriasProfesorController')->names('profesores');

    });
    Route::put('Asesorias/approve/{id}', 'App\Http\Controllers\AsesoriasController@approve')->name('asesorias.approve');


    // Biblioteca
    Route::resource('biblioteca', 'App\Http\Controllers\BibliotecaController')->names('biblioteca');
    Route::put('biblioteca/approve/{id}', 'App\Http\Controllers\BibliotecaController@approve')->name('biblioteca.approve');

    //Sustentabilidad
    Route::resource('sustentabilidad', 'App\Http\Controllers\SustentabilidadController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('sustentabilidad');
    Route::put('sustentabilidad/approve/{id}', 'App\Http\Controllers\SustentabilidadController@approve')->name('sustentabilidad.approve');

    //sociaded de alumnos 
    Route::resource('sociedad-alumnos', 'App\Http\Controllers\SociedadAlumnosController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('sociedad-alumnos');
    Route::put('sociedad-alumnos/approve/{id}', 'App\Http\Controllers\SociedadAlumnosController@approve')->name('sociedad-alumnos.approve');          

    //Educacion Continua 
    Route::resource('educacion-continua', 'App\Http\Controllers\EducacionContinuaController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('educacion-continua');
   
   
    Route::put('educacion-continua/approve/{id}', 'App\Http\Controllers\EducacionContinuaController@approve')->name('educacion-continua.approve');

    //Anuncios
    Route::resource('avisos', 'App\Http\Controllers\AnunciosController', ['except' => ['show']])->names('avisos');
    Route::get('avisos/data', 'App\Http\Controllers\AnunciosController@dataindex')->name('avisos.data');
    Route::post('avisos/upload', 'App\Http\Controllers\AnunciosController@uploadTinyImage')->name('avisos.upload');
    Route::put('avisos/approve/{id}', 'App\Http\Controllers\AnunciosController@approve')->name('avisos.approve');
    Route::resource('avisos-categorias', 'App\Http\Controllers\AnunciosCategoriasController', ['except' => ['show']])->names('avisos.categoria');
    Route::get('avisos-categorias/data', 'App\Http\Controllers\AnunciosCategoriasController@dataindex')->name('avisos.categoria.data');
    Route::put('avisos-categorias/approve/{id}', 'App\Http\Controllers\AnunciosCategoriasController@approve')->name('avisos.categoria.approve');

    //Escolar
    Route::resource('escolar', 'App\Http\Controllers\EscolarController', ['except' => ['show']])->names('escolar');
    Route::resource('escolar/preguntas', 'App\Http\Controllers\EscolarPreguntasFecuentesController', ['except' => ['show']])->names('escolar.preguntas');
    Route::get('escolar/preguntas/data', 'App\Http\Controllers\EscolarPreguntasFecuentesController@dataindex')->name('escolar.preguntas.data');
    Route::put('escolar/preguntas/approve/{id}', 'App\Http\Controllers\EscolarPreguntasFecuentesController@approve')->name('escolar.preguntas.approve');

    Route::put('escolar/approve/{id}', 'App\Http\Controllers\EscolarController@approve')->name('escolar.approve');

    //AsuntosUniversitarios
    Route::resource('asuntos-universtarios', 'App\Http\Controllers\AsuntosUniversitariosController', ['except' => ['show']])->names('asuntos.universitarios');
    Route::put('asuntos-universtarios/approve/{id}', 'App\Http\Controllers\AsuntosUniversitariosController@approve')->name('asuntos.universitarios.approve');

    //Calidad educativa
    Route::prefix('calidad-educativa')->name('calidad-educativa.')->group(function(){
         //Posgrados
        Route::get('informacion/data', 'App\Http\Controllers\CalidadEducativaController@dataindex')->name('informacion.data');
        Route::resource('informacion', 'App\Http\Controllers\CalidadEducativaController')->names('informacion');
        Route::put('approve/{id}', 'App\Http\Controllers\CalidadEducativaController@approve')->name('approve');


        //Calidad educativa de licenciaturas
        Route::get('licenciaturas/data', 'App\Http\Controllers\CalidadEducativaLicenciaturaController@dataindex')->name('licenciaturas.data');
        Route::resource('licenciaturas', 'App\Http\Controllers\CalidadEducativaLicenciaturaController', ['except' => ['show', 'delete']])->names('licenciaturas');
        Route::post('licenciaturas/upload', 'App\Http\Controllers\CalidadEducativaLicenciaturaController@uploadTinyImage')->name('licenciaturas.upload');
        Route::put('licenciaturas/approve/{id}', 'App\Http\Controllers\CalidadEducativaLicenciaturaController@approve')->name('licenciaturas.approve');
     
        //Calidad educativa de posgrados
        Route::get('posgrados/data', 'App\Http\Controllers\CalidadEducativaPosgradoController@dataindex')->name('posgrados.data');
        Route::resource('posgrados', 'App\Http\Controllers\CalidadEducativaPosgradoController', ['except' => ['show', 'delete']])->names('posgrados');
        //Route::get('posgrados/data', 'App\Http\Controllers\CAADIController@dataindex')->name('caadi.data');
        Route::post('posgrados/upload', 'App\Http\Controllers\CalidadEducativaPosgradoController@uploadTinyImage')->name('posgrados.upload');
        Route::put('posgrados/approve/{id}', 'App\Http\Controllers\CalidadEducativaPosgradoController@approve')->name('posgrados.approve');
       // Route::get('unidades-de-aprendizaje/data', 'App\Http\Controllers\MateriasPosgradoController@dataindex')->name('materias.data');

    });

    Route::prefix('escolar')->name('escolar.')->group (function(){

        //Indicadores Facultad
        Route::resource('indicadores-facultad', 'App\Http\Controllers\AcreditacionesIndicadoresFacultadController', ['except' => ['show']])->names('indicadores.facultad');
        Route::get('indicadores-facultad/data', 'App\Http\Controllers\AcreditacionesIndicadoresFacultadController@dataindex')->name('indicadores.facultad.data');
        Route::post('indicadores-facultad/upload', 'App\Http\Controllers\AcreditacionesIndicadoresFacultadController@uploadTinyImage')->name('indicadores.facultad.upload');
        Route::put('indicadores-facultad/approve/{id}', 'App\Http\Controllers\AcreditacionesIndicadoresFacultadController@approve')->name('indicadores.facultad.approve');


        //Indicadores Licenciaturas
        Route::resource('indicadores-licenciaturas', 'App\Http\Controllers\AcreditacionesIndicadoresLicenciaturasController', ['except' => ['show']])->names('indicadores.licenciaturas');
        Route::get('indicadores-licenciaturas/data', 'App\Http\Controllers\AcreditacionesIndicadoresLicenciaturasController@dataindex')->name('indicadores.licenciaturas.data');
        Route::post('indicadores-licenciaturas/upload', 'App\Http\Controllers\AcreditacionesIndicadoresLicenciaturasController@uploadTinyImage')->name('indicadores.licenciaturas.upload');
        Route::put('indicadores-licenciaturas/approve/{id}', 'App\Http\Controllers\AcreditacionesIndicadoresLicenciaturasController@approve')->name('indicadores.licenciaturas.approve');
        Route::get('indicadores-licenciaturas/info', 'App\Http\Controllers\AcreditacionesIndicadoresLicenciaturasController@data')->name('indicadores.licenciaturas.info');


        //Indicadores posgrados
        Route::resource('indicadores-posgrados', 'App\Http\Controllers\AcreditacionesIndicadoresPosgradoController', ['except' => ['show']])->names('indicadores.posgrados');
        Route::get('indicadores-posgrados/data', 'App\Http\Controllers\AcreditacionesIndicadoresPosgradoController@dataindex')->name('indicadores.posgrados.data');
        Route::post('indicadores-posgrados/upload', 'App\Http\Controllers\AcreditacionesIndicadoresPosgradoController@uploadTinyImage')->name('indicadores.posgrados.upload');
        Route::put('indicadores-posgrados/approve/{id}', 'App\Http\Controllers\AcreditacionesIndicadoresPosgradoController@approve')->name('indicadores.posgrados.approve');
        
    });

    //Calendario
    Route::get('calendario/{mes}','App\Http\Controllers\CalendarController@index_month')->name('calendar.index_month');
    Route::get('calendario','App\Http\Controllers\CalendarController@index')->name('calendar.index');

    // Noticias
    Route::resource('noticias', 'App\Http\Controllers\NoticiaController', ['except' => ['show']])->names('noticias');
    Route::get('noticias/data', 'App\Http\Controllers\NoticiaController@dataindex')->name('noticias.data');
    Route::put('noticias/approve/{id}', 'App\Http\Controllers\NoticiaController@approve')->name('noticias.approve');
    Route::post('noticias/upload', 'App\Http\Controllers\NoticiaController@uploadTinyImage')->name('noticias.upload');
    Route:: get ('noticias/findNewsCategories/{id}','App\Http\Controllers\NoticiaController@findNewsCategories')->name('noticias.show');

    // Categorías de noticias
    Route::resource('noticias-categorias', 'App\Http\Controllers\NoticiasCategoriaController', ['except' => ['show']])->names('noticias.categorias');
    Route::get('noticias-categorias/data', 'App\Http\Controllers\NoticiasCategoriaController@dataindex')->name('noticias.categorias.data');
    Route::put('noticias-categorias/approve/{id}', 'App\Http\Controllers\NoticiasCategoriaController@approve')->name('noticias.categorias.approve');


    // Emprendedores
    Route::resource('emprendedores', 'App\Http\Controllers\EmprendimientoController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('emprendimiento');
    Route::put('emprendedores/approve/{id}', 'App\Http\Controllers\EmprendimientoController@approve')->name('emprendimiento.approve');

    // Proyectos de emprendedores
    Route::resource('emprendedores/proyectos', 'App\Http\Controllers\ProyectosEmprendimientoController', ['except' => ['show']])->names('emprendimiento.proyectos');
    Route::get('emprendedores/proyectos/data', 'App\Http\Controllers\ProyectosEmprendimientoController@dataindex')->name('emprendimiento.proyectos.data');
    Route::post('emprendedores/proyectos/upload', 'App\Http\Controllers\ProyectosEmprendimientoController@uploadTinyImage')->name('emprendimiento.proyectos.upload');
    Route::put('emprendedores/proyectos/approve/{id}', 'App\Http\Controllers\ProyectosEmprendimientoController@approve')->name('emprendimiento.proyectos.approve');

    //Publicaciones de emprendedores
    Route::resource('emprendedores/publicaciones', 'App\Http\Controllers\PublicacionesEmprendimientoController', ['except' => ['show']])->names('emprendimiento.publicaciones');
    Route::get('emprendedores/publicaciones/data', 'App\Http\Controllers\PublicacionesEmprendimientoController@dataindex')->name('emprendimiento.publicaciones.data');
    Route::post('emprendimiento/publicaciones/upload', 'App\Http\Controllers\PublicacionesEmprendimientoController@uploadTinyImage')->name('emprendimiento.publicaciones.upload');
    Route::put('emprendedores/publicaciones/approve/{id}', 'App\Http\Controllers\PublicacionesEmprendimientoController@approve')->name('emprendimiento.publicaciones.approve');

    //CAADI
    Route::resource('caadi', 'App\Http\Controllers\CAADIController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('caadi');
    Route::get('caadi/data', 'App\Http\Controllers\CAADIController@dataindex')->name('caadi.data');
    Route::post('caadi/upload', 'App\Http\Controllers\CAADIController@uploadTinyImage')->name('caadi.upload');
    Route::put('caadi/approve/{id}', 'App\Http\Controllers\CAADIController@approve')->name('caadi.approve');


    // Becas
    Route::resource('becas', 'App\Http\Controllers\BecasController')->names('becas');
    Route::put('becas/approve/{id}', 'App\Http\Controllers\BecasController@approve')->name('becas.approve');
    Route::post('becas/upload', 'App\Http\Controllers\BecasController@uploadtinyimage')->name('becas.upload');

    //Tiny_Imagenes
    Route::post('upload', 'App\Http\Controllers\NoticiaController@uploadtinyimage')->name('upload');

    // Upload tiny images
    Route::post('upload-images', 'App\Http\Controllers\TinyImageController@uploadTinyImage')->name('upload-images');

    // Estrategia digital
    Route::resource('estrategia-digital', 'App\Http\Controllers\EstrategiaDigitalController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('estrategia-digital');
    Route::put('estrategia-digital/approve/{id}', 'App\Http\Controllers\EstrategiaDigitalController@approve')->name('estrategia-digital.approve');

    // Movilidad Estudiantil
    Route::resource('movilidad-estudiantil', 'App\Http\Controllers\InternacionalizacionController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('internacionalizacion');
    Route::put('movilidad-estudiantil/approve/{id}', 'App\Http\Controllers\InternacionalizacionController@approve')->name('internacionalizacion.approve');

    // Unidad Linares
    Route::resource('unidad-linares', 'App\Http\Controllers\LinaresController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('unidad-linares');
    Route::put('linares/approve/{id}', 'App\Http\Controllers\LinaresController@approve')->name('linares.approve');

    // AsuntosUniversitarios
    Route::resource('deportivo', 'App\Http\Controllers\DeportivoController', ['except' => ['show']])->names('deportivo');
    Route::put('deportivo/approve/{id}', 'App\Http\Controllers\DeportivoController@approve')->name('deportivo.approve');

    // Internacionalizacion
    Route::resource('movilidad-estudiantil', 'App\Http\Controllers\InternacionalizacionController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('internacionalizacion');
    Route::put('movilidad-estudiantil/approve/{id}', 'App\Http\Controllers\InternacionalizacionController@approve')->name('internacionalizacion.approve');

    // Facultad - Secciones
    Route::resource('facultad/secciones', 'App\Http\Controllers\FacultadSeccionesController', ['except' => ['show']])->names('facultad.secciones');
    Route::get('facultad/secciones/data', 'App\Http\Controllers\FacultadSeccionesController@dataindex')->name('facultad.secciones.data');
    Route::put('facultad/secciones/approve/{id}', 'App\Http\Controllers\FacultadSeccionesController@approve')->name('facultad.secciones.approve');
    Route::post('facultad/upload', 'App\Http\Controllers\FacultadSeccionesController@uploadTinyImage')->name('facultad.upload');
    
    // Facultad - Informes
    Route::resource('facultad/informes', 'App\Http\Controllers\FacultadInformesController', ['except' => ['show']])->names('facultad.informes');
    Route::get('facultad/informes/data', 'App\Http\Controllers\FacultadInformesController@dataindex')->name('facultad.informes.data');
    Route::put('facultad/informes/approve/{id}', 'App\Http\Controllers\FacultadInformesController@approve')->name('facultad.informes.approve');
    
    // Facultad - Profesores Eméritos
    Route::resource('facultad/profesores-emeritos', 'App\Http\Controllers\ProfesoresEmeritosController', ['except' => ['show']])->names('facultad.profesores-emeritos');
    Route::get('facultad/profesores-emeritos/data', 'App\Http\Controllers\ProfesoresEmeritosController@dataindex')->name('facultad.profesores-emeritos.data');
    Route::put('facultad/profesores-emeritos/approve/{id}', 'App\Http\Controllers\ProfesoresEmeritosController@approve')->name('facultad.profesores-emeritos.approve');
    
    // Facultad - Ex Directores 
    Route::resource('facultad/ex-directores', 'App\Http\Controllers\ExDirectoresController', ['except' => ['show']])->names('facultad.ex-directores');
    Route::get('facultad/ex-directores/data', 'App\Http\Controllers\ExDirectoresController@dataindex')->name('facultad.ex-directores.data');
    Route::put('facultad/ex-directores/approve/{id}', 'App\Http\Controllers\ExDirectoresController@approve')->name('facultad.ex-directores.approve');

    // Semestres
    Route::resource('semestres',  'App\Http\Controllers\SemestresController', ['except' => ['show']])->names('semestres');
    Route::get('semestres/data', 'App\Http\Controllers\SemestresController@dataindex')->name('semestres.data');

    // Semestres
    Route::resource('semestres',  'App\Http\Controllers\SemestresController', ['except' => ['show']])->names('semestres');
    
    // Servicio Social
    Route::resource('servicio-social', 'App\Http\Controllers\ServicioSocialController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('servicio-social');
    Route::put('servicio-social/approve/{id}', 'App\Http\Controllers\ServicioSocialController@approve')->name('servicio-social.approve');

    Route::resource('servicio-social/preguntas', 'App\Http\Controllers\ServicioPreguntasFrecuentesController', ['except' => ['show']])->names('servicio-social.preguntas');
    Route::get('servicio-social/preguntas/data', 'App\Http\Controllers\ServicioPreguntasFrecuentesController@dataindex')->name('servicio-social.preguntas.data');
    Route::put('servicio-social/preguntas/approve/{id}', 'App\Http\Controllers\ServicioPreguntasFrecuentesController@approve')->name('servicio-social.preguntas.approve');

    Route::get('servicio-social/documentos/data', 'App\Http\Controllers\ServicioDocumentosController@dataindex')->name('servicio-social.documentos.data');
    Route::resource('servicio-social/documentos', 'App\Http\Controllers\ServicioDocumentosController')->names('servicio-social.documentos');
    Route::put('servicio-social/documentos/approve/{id}', 'App\Http\Controllers\ServicioDocumentosController@approve')->name('servicio-social.documentos.approve');


    // Tesorería
    Route::resource('tesoreria', 'App\Http\Controllers\TesoreriaController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('tesoreria');
    Route::put('tesoreria/approve/{id}', 'App\Http\Controllers\TesoreriaController@approve')->name('tesoreria.approve');

    // Tesorería - Preguntas frecuentes
    Route::resource('tesoreria/preguntas', 'App\Http\Controllers\TesoreriaPreguntasFrecuentesController', ['except' => ['show']])->names('tesoreria.preguntas');
    Route::get('tesoreria/preguntas/data', 'App\Http\Controllers\TesoreriaPreguntasFrecuentesController@dataindex')->name('tesoreria.preguntas.data');
    Route::put('tesoreria/preguntas/approve/{id}', 'App\Http\Controllers\TesoreriaPreguntasFrecuentesController@approve')->name('tesoreria.preguntas.approve');
    
    // Prácticas profesionales
    Route::resource('practicas-profesionales', 'App\Http\Controllers\PracticasProfesionalesController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('practicas-profesionales');
    Route::put('practicas-profesionales/approve/{id}', 'App\Http\Controllers\PracticasProfesionalesController@approve')->name('practicas-profesionales.approve');

    Route::resource('practicas-profesionales/preguntas', 'App\Http\Controllers\PracticasPreguntasFrecuentesController', ['except' => ['show']])->names('practicas-profesionales.preguntas');
    Route::get('practicas-profesionales/preguntas/data', 'App\Http\Controllers\PracticasPreguntasFrecuentesController@dataindex')->name('practicas-profesionales.preguntas.data');
    Route::put('practicas-profesionales/preguntas/approve/{id}', 'App\Http\Controllers\PracticasPreguntasFrecuentesController@approve')->name('practicas-profesionales.preguntas.approve');

    //Guia EXEN
    Route::resource('guia-exens', 'App\Http\Controllers\GuiaEXENController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('guia-exens');
    Route::put('guia-exens/approve/{id}', 'App\Http\Controllers\GuiaEXENController@approve')->name('guia-exens.approve');

    //Guia Nuevo Ingreso
    Route::resource('guia-nuevo-ingreso', 'App\Http\Controllers\GuiaNIngresoController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('guia-nuevo-ingreso');
    Route::put('guia-nuevo-ingreso/approve/{id}', 'App\Http\Controllers\GuiaNIngresoController@approve')->name('guia-nuevo-ingreso.approve');

    //Museo
    Route::resource('museo', 'App\Http\Controllers\MuseoController', ['except' => ['show']])->names('museo');
    Route::get('museo/data', 'App\Http\Controllers\MuseoController@dataindex')->name('museo.data');
    Route::put('museo/approve/{id}', 'App\Http\Controllers\MuseoController@approve')->name('museo.approve');

    //Observatorio
    Route::resource('observatorio', 'App\Http\Controllers\ObservatorioController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('observatorio');
    Route::put('observatorio/approve/{id}', 'App\Http\Controllers\ObservatorioController@approve')->name('observatorio.approve');
    
    //Destilado
    Route::resource('destilado', 'App\Http\Controllers\DestiladoAgaveController', ['except' => ['show', 'create', 'edit', 'update', 'delete']])->names('destilado');
    Route::put('destilado/approve/{id}', 'App\Http\Controllers\DestiladoAgaveController@approve')->name('destilado.approve');

    // Preview
    Route::prefix('preview')->name('preview.')->group(function(){
        // Asuntos Universitarios
        Route::get('asuntos-universitarios', 'App\Http\Controllers\PreviewController@asuntosUniversitarios')->name('asuntos-universitarios.show');

        // Avisos
        Route::get('avisos', 'App\Http\Controllers\PreviewController@avisos')->name('avisos.show');//se cambio avisos por anuncios

        // Becas
        Route::get('becas', 'App\Http\Controllers\PreviewController@becas')->name('becas.show');

        // Biblioteca
        Route::get('biblioteca', 'App\Http\Controllers\PreviewController@biblioteca')->name('biblioteca.show');
        
        // caadi
        Route::get('caadi', 'App\Http\Controllers\PreviewController@caadi')->name('caadi.show');

        // calidad educativa
        Route::get('calidadEducativa', 'App\Http\Controllers\PreviewController@calidadEducativa')->name('calidadEducativa.show');
        
        // deportivo
        Route::get('deportivo', 'App\Http\Controllers\PreviewController@deportivo')->name('deportivo.show');

        // Educacion Continua
        Route::get('educacion-continua', 'App\Http\Controllers\PreviewController@educacioncontinua')->name('educacioncontinua.show');

        // Ex directores
        Route::get('exDirectores', 'App\Http\Controllers\PreviewController@exDirectores')->name('exDirectores.show');

        // Emprendimiento
        Route::get('emprendedores', 'App\Http\Controllers\PreviewController@emprendedores')->name('emprendedores.show');

        // Escolar
        Route::get('escolar', 'App\Http\Controllers\PreviewController@escolar')->name('escolar.show');

        // Estrategia digital
        Route::get('estrategiadigital', 'App\Http\Controllers\PreviewController@estrategiaDigital')->name('estrategiadigital.show');

        // Facultad
        Route::get('facultad', 'App\Http\Controllers\PreviewController@facultad')->name('facultad.show');

        // Facultad informes
        Route::get('facultadInformes', 'App\Http\Controllers\PreviewController@facultadInformes')->name('facultadInformes.show');

        // Internacionalizacion
        Route::get('internacionalizacion', 'App\Http\Controllers\PreviewController@internacionalizacion')->name('internacionalizacion.show');

        // Licenciaturas
        Route::get('licenciaturas', 'App\Http\Controllers\PreviewController@licenciaturas')->name('licenciaturas.show');

        // Licenciaturas Congresos
        Route::get('congresosLicenciaturas', 'App\Http\Controllers\PreviewController@congresosLicenciaturas')->name('congresosLicenciaturas.show');

        // Movilidad Estudiantil
        Route::get('movilidad-estudiantil', 'App\Http\Controllers\PreviewController@movilidadEstudiantil')->name('movilidad-estudiantil.show');
        
        // Tutorias
        Route::get('tutorias', 'App\Http\Controllers\PreviewController@tutorias')->name('tutorias.show');

        // Prácticas profesionales
        Route::get('practicas-profesionales', 'App\Http\Controllers\PreviewController@practicasProfesionales')->name('practicas-profesionales.show');

        // Profesores Eméritos
        Route::get('profesoresEmeritos', 'App\Http\Controllers\PreviewController@profesoresEmeritos')->name('profesoresEmeritos.show');

        // Noticias
        Route::get('noticias', 'App\Http\Controllers\PreviewController@noticias')->name('noticias.show');

        // Mostrar una noticia
        Route::get('noticias/{slug}', 'App\Http\Controllers\PreviewController@mostrarNoticia')->name('noticias.mostrar-noticia');

        // Noticias por categoria
        Route::get('noticias', 'App\Http\Controllers\PreviewController@noticiasCat')->name('noticias.mostrar-por-categoria');

        // Universidad Saludable
        Route::get('universidad-saludable', 'App\Http\Controllers\PreviewController@universidadSaludable')->name('universidad-saludable.show');

        // Servicio social
        Route::get('servicio-social', 'App\Http\Controllers\PreviewController@servicioSocial')->name('servicio-social.show');

        // Sustentabilidad
        Route::get('sustentabilidad', 'App\Http\Controllers\PreviewController@sustentabilidad')->name('sustentabilidad.show');

        // Tesorería
        Route::get('tesoreria', 'App\Http\Controllers\PreviewController@tesoreria')->name('tesoreria.show');
        
        // Actividades culturales
        Route::get('actividades-culturales', 'App\Http\Controllers\PreviewController@actividadesCulturales')->name('actividades-culturales.show');

        // Guia EXEN
        Route::get('guia-exens', 'App\Http\Controllers\PreviewController@guiaEXEN')->name('guia-exens.show');

        //Guia Nuevo Ingreso
        Route::get('guia-nuevo-ingreso', 'App\Http\Controllers\PreviewController@guiaNuevoIngreso')->name('guia-nuevo-ingreso.show');

        // Museo
        Route::get('museo', 'App\Http\Controllers\PreviewController@museo')->name('museo.show');

        //Sociedad alumnos
        Route::get('sociedad-alumnos', 'App\Http\Controllers\PreviewController@sociedadAlumnos')->name('sociedad-alumnos.show');

    });

});

Route::post('indexEmpleado','App\Http\Controllers\ControllerUsers@import')->name('procesarArchivo');

Route::group(['middleware' => 'auth:empleado'], function () {
    Route::prefix('SistemaEscolar')->name('sistema.escolar.')->group (function(){
        //Cambio Calificaciones
        Route::resource('cambio-calificaciones', 'App\Http\Controllers\CalificacionesController', ['except' => ['show']])->names('calificaciones.solicitudes');
        Route::get('cambio-calificaciones/coordinadores', 'App\Http\Controllers\CalificacionesController@indexCoordinador')->name('calificaciones.solicitudes.coordinadores')->withoutMiddleware(['show']);
        Route::get('cambio-calificaciones/escolar', 'App\Http\Controllers\CalificacionesController@indexEscolar')->name('calificaciones.solicitudes.escolar')->withoutMiddleware(['show']);
        Route::get('cambio-calificaciones/subacademico', 'App\Http\Controllers\CalificacionesController@indexSubAcademico')->name('calificaciones.solicitudes.subacademico')->withoutMiddleware(['show']);
        Route::get('cambio-calificaciones/registro-solicitud', 'App\Http\Controllers\CalificacionesController@formSolicitud')->name('calificaciones.solicitudes.crear')->withoutMiddleware(['show']);
        Route::get('cambio-calificaciones/registro-cambio', 'App\Http\Controllers\CalificacionesController@formCambioCalificacion')->name('calificaciones.solicitudes.crearCambiocalificacion')->withoutMiddleware(['show']);
        Route::get('cambio-calificaciones/docente/{id}', 'App\Http\Controllers\CalificacionesController@indexDocente')->name('calificaciones.solicitudes.docentes')->withoutMiddleware(['show']);
        //Lista materias
        Route::get('cambio-calificaciones/indexMaterias','App\Http\Controllers\CalificacionesController@indexMaterias')->name('calificaciones.solicitudes.listaMaterias')->withoutMiddleware(['show']);
        Route::get('cambio-calificaciones/indexAlumnos/{idGrupo}', 'App\Http\Controllers\CalificacionesController@indexAlumnos')->name('calificaciones.solicitudes.listaAlumnos')->withoutMiddleware(['show']);
        Route::post('cambio-calificaciones/indexSolicitud/','App\Http\Controllers\CalificacionesController@indexSolicitud')->name('calificaciones.solicitudes.indexSolicitud')->withoutMiddleware(['show']);
        Route::get('cambio-calificaciones/indexSolicitudAlumnos/{idSolicitud}', 'App\Http\Controllers\CalificacionesController@indexSolicitudAlumnos')->name('calificaciones.solicitudes.indexSolicitudAlumnos')->withoutMiddleware(['show']);
        //
        //Historial de Solicitud
        Route::get('cambio-calificaciones/historialSolicitud/{idSolicitud}', 'App\Http\Controllers\CalificacionesController@historialSolicitud')->name('calificaciones.solicitudes.historialSolicitud')->withoutMiddleware(['show']);
        Route::post('cambio-calificaciones/actualizarHistorialSolicitud/','App\Http\Controllers\CalificacionesController@actualizarHistorialSolicitud')->name('calificaciones.solicitudes.actualizarHistorialSolicitud')->withoutMiddleware(['show']);


        //temporales CambioCalificaciones Prototipo
        //sistema/escolar/cambio-calificaciones/coordinadores/VerDetalle/
        Route::get('cambio-calificaciones/coordinador/VerDetalle/{id}', 'App\Http\Controllers\CalificacionesController@VerDetalleCoordinador')->name('calificaciones.solicitudes.coordinadores.VerDetalleCoordinador')->withoutMiddleware(['show']);
        Route::get('cambio-calificaciones/subacademico/VerDetalle/{id}', 'App\Http\Controllers\CalificacionesController@VerDetalleSubAcademico')->name('calificaciones.solicitudes.coordinadores.VerDetalleSubAcademico')->withoutMiddleware(['show']);
        Route::get('cambio-calificaciones/escolar/VerDetalle/{id}', 'App\Http\Controllers\CalificacionesController@VerDetalleEscolar')->name('calificaciones.solicitudes.coordinadores.VerDetalleEscolar')->withoutMiddleware(['show']);

        //Actualización de Semestre en Indicadores de Escolar
        Route::get('update-semestre', 'App\Http\Controllers\SemestresController@semestreUpdateView')->name('actualizarsemestre')->withoutMiddleware(['show']);
        Route::put('semestre/actualizar/{id}', 'App\Http\Controllers\SemestresController@semestreUpdate')->name('semestre.actualizar');
    });
    
 });

Route::group(['middleware' => 'auth:empleado'], function () {
    Route::get('empleado/SistemaEscolar/homeEscolar', [App\Http\Controllers\HomeSistemaEscolarController::class, 'index'])->name('homeEscolar');

    //CambioCalificaciones Solicitudes
    Route::prefix('cambio-calificaciones')->name('cambio-calificaciones.')->group(function(){
        Route::post('solicitud/store','App\Http\Controllers\CalificacionesController@storeSolicitud')->name('solicitud.store');
        /*cambio-calificaciones.solicitud.store-cambio */
        Route::post('solicitud/store/cambio', 'App\Http\Controllers\CalificacionesController@addAlumnoSolicitud')->name('solicitud.store-cambio');
        /*cambio-calificaciones.solicitud.get */
        Route::get('solicitud/get', 'App\Http\Controllers\CalificacionesController@dataindex')->name('solicitud.get');
        /*cambio-calificaciones.solicitud.getEnviadas */
        Route::get('solicitud/getEnviadas/{Estatus}', 'App\Http\Controllers\CalificacionesController@dataindexFirma')->name('solicitud.getEnviadas');
        /**/
        Route::get('solicitud/getEnviadas/{Estatus}/{licenciaturaId}', 'App\Http\Controllers\CalificacionesController@dataindexFirmaByLicenciatura')->name('solicitud.getEnviadas.licenciatura');
        /*cambio-calificaciones.solicitud.getEnviadasEscolar */
        Route::get('solicitud/getEnviadasEscolar', 'App\Http\Controllers\CalificacionesController@dataindexEscolar')->name('solicitud.getEnviadasEscolar');
        /*cambio-calificaciones.solicitud.getCambiosBySolicitud
        cambio-calificaciones/solicitud/getCambiosBySolicitud/{id}*/
        Route::get('solicitud/getCambiosBySolicitud/{id}', 'App\Http\Controllers\CalificacionesController@getCambiosBySolicitud')->name('solicitud.getCambiosBySolicitud');
        /*cambio-calificaciones.solicitud.getDatosDocumento
        cambio-calificaciones/solicitud/getDatosDocumento/{id}*/
        Route::get('solicitud/getDatosDocumento/{id}','App\Http\Controllers\CalificacionesController@getDatosDocumento')->name('solicitud.getDatosDocumento');
            /*cambio-calificaciones.solicitud.cambios-by-id
        cambio-calificaciones/solicitud/get/cambios/{id}*/
        Route::get('solicitud/get/cambios/{id}', 'App\Http\Controllers\CalificacionesController@getCambioById')->name('solicitud.cambios-by-id');
        /*cambio-calificaciones.solicitud.firmas
        cambio-calificaciones/solicitud/firmas/{id}*/
        Route::get('solicitud/firmas/{id}', 'App\Http\Controllers\CalificacionesController@getFirmas')->name('solicitud.firmas');
        /*cambio-calificaciones.solicitud.update.cambio
        cambio-calificaciones/solicitud/update/cambio/{id}*/
        Route::put('solicitud/update/cambio/{id}','App\Http\Controllers\CalificacionesController@updateAlumnoSolicitud')->name('solicitud.update-cambio');
        /*cambio-calificaciones.solicitud.softdelete.cambio
        cambio-calificaciones/solicitud/softdelete/cambio/{id}*/
        Route::patch('solicitud/softdelete/cambio/{id}','App\Http\Controllers\CalificacionesController@softDeleteAlumnoSolicitud')->name('solicitud.softdelete-cambio');
        Route::patch('solicitud/softdelete/cambioAlumno/{id}','App\Http\Controllers\CalificacionesController@softDeleteAlumnoSolicitudIndividual')->name('solicitud.softdelete-cambioIndividual');
        /*cambio-calificaciones.solicitud.estatus
        cambio-calificaciones/solicitud/estatus{id}*/
        Route::patch('solicitud/estatus/{id}','App\Http\Controllers\CalificacionesController@CambiarEstatus')->name('solicitud.estatus');

        //cambio-calificaciones/firmas/
        Route::prefix('firmas')->name('firmas.')->group(function(){
            //cambio-calificaciones/firmas/tipoFirma/store
            //cambio-calificaciones.firmas.store
            Route::post('/storeFirmaEscolar/{solicitudId}', 'App\Http\Controllers\FirmasController@storeFirmaEscolar')->name('store.Escolar');
            Route::patch('{solicitudId}/agregarFirmas/{tipo}', 'App\Http\Controllers\FirmasController@agregarFirmas')->name('store.Firmas');
        });

        //cambio-calificaciones/declinar/1
        //cambio-calificaciones.declinar
        Route::patch('/declinar/{solicitudId}', 'App\Http\Controllers\CalificacionesController@declinarSolicitud')->name('declinar');

        //comentarioSolicitud
        Route::patch('/comentarioSolicitud/{solicitudId}','App\Http\Controllers\CalificacionesController@comentarioSolicitud')->name('comentarioSolicitud');
        Route::get('cambio-calificaciones/verMotivo/{idSolicitud}', 'App\Http\Controllers\CalificacionesController@verMotivo')->name('verMotivo')->withoutMiddleware(['show']);
        Route::patch('cambio-calificaciones/reactivarSolicitud/{idSolicitud}', 'App\Http\Controllers\CalificacionesController@reactivarSolicitud')->name('reactivarSolicitud');

    }); 
    //Materias
    Route::prefix('materias')->name('materias.')->group(function(){
        Route::get('/materias-plan/{planId}', 'App\Http\Controllers\MateriaController@getMateriasByPlan')->name('materias-by-plan');

    });
    //Grupos
    Route::prefix('grupos')->name('grupos.')->group(function(){
        Route::get('/by-matus/{materiaId}', 'App\Http\Controllers\GrupoController@getGruposByUser')->name('grupo-by-usuario-materia');
    });


    
    // Ruta para Cambio de Calificaciones (index)
    Route::get('cambio-calificaciones', 'App\Http\Controllers\CalificacionesController@index')->name('cambio-calificaciones.index');

    // Mostrar solicitudes pendientes
    Route::group(['middleware' => 'auth:empleado'], function () {
        Route::get('solicitudes-en-progreso', [App\Http\Controllers\SolicitudesController::class, 'solicitudesEnProgreso'])->name('Request.progreso');
    });
    
    Route::prefix('SistemaEscolar')->name('SistemaEscolar.')->group(function(){
        //Login
        Route::post('/logout', 'App\Http\Controllers\Auth\EmployeeLoginController@logout')->name('logout');

        //Empleados
        Route::prefix('empleados')->name('empleados.')->group(function(){
            // --------------------------Views-----------------------------------------------------------------
            //SistemaEscolar.empleados.index
            Route::get('/', 'App\Http\Controllers\EmpleadoController@Index')->name('index')->withoutMiddleware(['show']);
            //SistemaEscolar.empleados.create
            Route::get('create', 'App\Http\Controllers\EmpleadoController@create')->name('create')->withoutMiddleware(['show']);
            //SistemaEscolar.empleados.modificar
            Route::get('modificar/{id}', 'App\Http\Controllers\EmpleadoController@modificar')->name('modificar')->withoutMiddleware(['show']);
            //SistemaEscolar.empleados.updateFirma
            Route::get('updateFirma', 'App\Http\Controllers\EmpleadoController@updateSignature')->name('updateFirma')->withoutMiddleware(['show']);
            //SistemaEscolar.empleados.cambio-contrasena
            Route::get('cambio-contrasena', 'App\Http\Controllers\EmpleadoController@cambioContrasena')->name('cambio-contrasena')->withoutMiddleware(['show']);
            //--------------------------Funcionalidad-----------------------------------------------------------
            // SistemaEscolar.empleados.store
            Route::post('/store', 'App\Http\Controllers\EmpleadoController@store')->name('store');
            // SistemaEscolar.empleados.get
            Route::get('/get', 'App\Http\Controllers\EmpleadoController@get')->name('get');

            // Ruta para obtener un empleado por su ID (getById)
            Route::get('/get/{id}', 'App\Http\Controllers\EmpleadoController@getById')->name('getById');

            // Ruta para obtener empleados por su número de empleado (getByNoEmp)
            Route::get('/getByNoEmp/{noEmp}', 'App\Http\Controllers\EmpleadoController@getByNoEmp')->name('getByNoEmp');

            // SistemaEscolar.empleados.update
            Route::put('/update/{id}', 'App\Http\Controllers\EmpleadoController@update')->name('update');

            // Ruta para eliminar lógicamente un empleado por su ID (delete)
            Route::patch('/delete/{id}', 'App\Http\Controllers\EmpleadoController@delete')->name('delete');
            //SistemaEscolar.empleados.actualizar.firma
            Route::post('/actualizar-firma', 'App\Http\Controllers\EmpleadoController@actualizarFirma')->name('actualizar.firma');
            //SistemaEscolar.empleados.cargar.firmaUsuario
            Route::get('/mostrarFirma','App\Http\Controllers\EmpleadoController@cargarFirmaUsuario')->name('cargar.firma');
            
            //SistemaEscolar.empleados.cambiar-contrasena
            Route::patch('/cambiar-contraseña', 'App\Http\Controllers\EmpleadoController@changePassword')->name('cambiar-contrasena');
        });
    });
});

Route::get('/empleado/login', 'App\Http\Controllers\Auth\EmployeeLoginController@showLoginForm')->name('SistemaEscolar.empleado.login');
Route::post('/empleado/login/auth', 'App\Http\Controllers\Auth\EmployeeLoginController@login')->name('SistemaEscolar.empleado.auth');


