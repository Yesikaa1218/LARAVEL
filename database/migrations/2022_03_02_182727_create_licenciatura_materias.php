<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciaturaMaterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenciatura_materias', function (Blueprint $table) {
            $table->id();
            $table->string('materia_licenciatur');
            $table->integer('creditos_materia_lic');
            $table->integer('horas_semana_materia_lic');
            $table->boolean('optativa_materia_lic');
            $table->integer('semestre_materia_lic');
            $table->text('descripcion_materia_lic');
            $table->text('requisitos_materia_lic');
            $table->unsignedBigInteger('plan_de_estudios_id');
            $table->foreign('plan_de_estudios_id')
            ->references('id')->on('planes_de_estudios')
            ->onDelete('cascade'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenciatura_materias');
    }
}
