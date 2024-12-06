<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeriodoAcademicoIdToPlanesEstudiosPosgradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planes_estudios_posgrado', function (Blueprint $table) {
            $table->unsignedBigInteger('periodo_academico_id');
            $table->foreign('periodo_academico_id')
            ->references('id')->on('periodo_academico')
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
        Schema::table('planes_estudios_posgrado', function (Blueprint $table) {
            $table->dropColumn('periodo_academico_id');
        });
    }
}
