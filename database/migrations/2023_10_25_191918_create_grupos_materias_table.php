<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposMateriasTable extends Migration
{
    public function up()
    {
        Schema::create('grupos_Materias', function (Blueprint $table) {
            $table->increments('idGrupo');
            $table->string('descripcion', 25);
            $table->boolean('Activo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupos_Materias');
    }
}
