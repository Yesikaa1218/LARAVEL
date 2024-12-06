<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idAlumno');
            $table->unsignedBigInteger('idGrupo');
            $table->integer('oportunidad');
            $table->unsignedInteger('tipoExamen');
            $table->float('calificacion', 5, 2);
            $table->timestamps();

            // Foreign keys
            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('idGrupo')->references('idGrupo')->on('grupos')->onDelete('cascade');
            $table->foreign('tipoExamen')->references('idTipoExamen')->on('tipo_examen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_alumnos');
    }
}
