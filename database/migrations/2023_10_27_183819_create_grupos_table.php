<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->bigIncrements('idGrupo');
            $table->string('descripcion', 25);
            $table->integer('capacidad');
            $table->bigInteger('fkEmpMat')->unsigned();
            $table->boolean('Activo');
            
            $table->foreign('fkEmpMat')->references('id')->on('empleados_materias');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
