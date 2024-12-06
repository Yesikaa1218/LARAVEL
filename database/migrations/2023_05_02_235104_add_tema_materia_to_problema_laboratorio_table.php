<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemaMateriaToProblemaLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('problema_laboratorio', function (Blueprint $table) {
            $table->unsignedBigInteger('tema_materia_id')->after('materia_laboratorio_id');
            $table->foreign('tema_materia_id')
             ->references('id')->on('tema_materia')
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
            $table->dropForeign('problema_laboratorio_tema_materia_id_foreign');
            $table->dropColumn('tema_materia_id');
        });
    }
}
