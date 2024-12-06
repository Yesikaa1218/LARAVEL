<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalidadEducativaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calidad_educativa', function (Blueprint $table) {
            $table->id();
            $table->text('mision');
            $table->text('vision');
            $table->text('plan_de_estudio');
            $table->text('objetivos');
            $table->text('perfil_de_egresados');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calidad_educativa');
    }
}
