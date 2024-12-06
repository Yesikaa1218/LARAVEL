<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasPosgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_posgrados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('materia_posgrado');
            $table->integer('creditos_materia_pos');
            $table->string('horas_semana_materia_pos');
            $table->boolean('optativa_materia_pos');
            $table->integer('semestre_materia_pos');
            $table->text('descripcion_materia_pos');
            $table->text('requisitos_materia_pos');
            $table->unsignedBigInteger('posgrado_id');
            $table->foreign('posgrado_id')
                            ->references('id')->on('posgrados')
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
        Schema::dropIfExists('materias_posgrados');
    }
}
