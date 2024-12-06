<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoExamenTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_examen', function (Blueprint $table) {
            $table->increments('idTipoExamen');
            $table->string('Descripcion', 50);
            $table->boolean('Activo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_examen');
    }
}
