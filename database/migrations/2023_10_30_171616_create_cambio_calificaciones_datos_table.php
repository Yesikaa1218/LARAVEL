<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCambioCalificacionesDatosTable extends Migration
{
    public function up()
    {
        Schema::create('cambio_calificaciones_datos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fkSolicitud')->unsigned();
            $table->string('NombreAlumno', 75);
            $table->string('Matricula', 100);
            $table->integer('fkTipoExamen')->unsigned();
            $table->float('CalifCorrecta');
            $table->float('CalifIncorrecta');
            $table->string('Motivo', 255);
            $table->boolean('Activo');
            $table->timestamps();

            $table->foreign('fkTipoExamen')->references('idTipoExamen')->on('tipo_examen');
            $table->foreign('fkSolicitud')->references('idSolicitudCambio')->on('cambioscalificacionessolicitudes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cambio_calificaciones_datos');
    }
}

