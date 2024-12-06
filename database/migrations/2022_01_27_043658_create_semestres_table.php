<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->timestamps();
        });

        Schema::table('acreditaciones_indicadores_facultad', function (Blueprint $table) {
            $table->dropColumn('fecha_inicio');
            $table->dropColumn('fecha_final');

            $table->unsignedBigInteger('semestre_id');
            $table->foreign('semestre_id')
                            ->references('id')->on('semestres')
                            ->onDelete('cascade');
        }); 


        Schema::table('acreditaciones_indicadores_licenciaturas', function (Blueprint $table) {
            $table->dropColumn('fecha_inicio');
            $table->dropColumn('fecha_final');

            $table->unsignedBigInteger('semestre_id');
            $table->foreign('semestre_id')
                            ->references('id')->on('semestres')
                            ->onDelete('cascade');
        });


        Schema::table('acreditaciones_indicadores_posgrados', function (Blueprint $table) {
            $table->dropColumn('fecha_inicio');
            $table->dropColumn('fecha_final');

            $table->unsignedBigInteger('semestre_id');
            $table->foreign('semestre_id')
                            ->references('id')->on('semestres')
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
        Schema::table('acreditaciones_indicadores_facultad', function (Blueprint $table) {
            $table->dropColumn('semestre_id');
        });
        Schema::table('acreditaciones_indicadores_licenciaturas', function (Blueprint $table) {
            $table->dropColumn('semestre_id');
        });
        Schema::table('acreditaciones_indicadores_posgrados', function (Blueprint $table) {
            $table->dropColumn('semestre_id');
        });

        Schema::dropIfExists('semestres');
    }
}
