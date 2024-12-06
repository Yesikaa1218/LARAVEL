<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMateriaLaboratorioIdToProblemaLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('problema_laboratorio', function (Blueprint $table) {
            $table->unsignedBigInteger('materia_laboratorio_id')->after('problema');
            $table->foreign('materia_laboratorio_id')
             ->references('id')->on('materia_laboratorio')
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
        Schema::table('problema_laboratorio', function (Blueprint $table) {
            $table->dropForeign('problema_laboratorio_materia_laboratorio_id_foreign');
            $table->dropColumn('materia_laboratorio_id');
        });
    }
}
