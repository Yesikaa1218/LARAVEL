<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('materia_licenciatur');
            $table->integer('creditos_materia_lic');
            $table->integer('horas_semana_materia_lic');
            $table->boolean('optativa_materia_lic');
            $table->integer('semestre_materia_lic');
            $table->text('descripcion_materia_lic');
            $table->text('requisitos_materia_lic');
            $table->string('wordpress_id')->nullable();
            $table->unsignedBigInteger('licenciatura_id');
            $table->foreign('licenciatura_id')
                            ->references('id')->on('licenciaturas')
                            ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
