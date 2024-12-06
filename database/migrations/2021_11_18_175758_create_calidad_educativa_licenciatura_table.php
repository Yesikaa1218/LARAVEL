<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalidadEducativaLicenciaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calidad_educativa_licenciatura', function (Blueprint $table) {
            $table->id();
            $table->text('mision');
            $table->text('vision');
            $table->text('objetivos');
            $table->text('perfil_de_egresados');
            $table->unsignedBigInteger('licenciatura_id');
            $table->foreign('licenciatura_id')
                ->references('id')->on('licenciaturas')
                ->onDelete('cascade');
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
        Schema::dropIfExists('calidad_educativa_licenciatura');
    }
}
