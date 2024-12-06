<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesDeEstudioTable extends Migration
{
    public function up()
    {
        Schema::create('planes_de_estudio', function (Blueprint $table) {
            $table->increments('idPlan');
            $table->string('descripcion', 75);
            $table->boolean('Activo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('planes_de_estudio');
    }
}
