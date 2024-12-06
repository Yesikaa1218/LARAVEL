<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeriodoAcademicoToExamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examen', function (Blueprint $table) {
            $table->string('periodo_academico', 45)->nullable()->after('cantidad_problemas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examen', function (Blueprint $table) {
            $table->string('periodo_academico');
        });
    }
}
