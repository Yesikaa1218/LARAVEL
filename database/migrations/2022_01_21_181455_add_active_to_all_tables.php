<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveToAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acreditaciones_indicadores_facultad', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('acreditaciones_indicadores_licenciaturas', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('acreditaciones_indicadores_posgrados', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('acreditaciones_posgrado', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('anuncios', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('anuncios_categorias', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('becas', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('calendario_categorias', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('calendarios', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('calidad_educativa', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('calidad_educativa_licenciatura', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('calidad_educativa_posgrado', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('disciplinas_deportivas', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('laboratorios', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('licenciaturas', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('materias', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('materias_posgrados', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('noticias', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
        
        Schema::table('noticias_categorias', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
                
        Schema::table('tutorias_laboratorios', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
        });
                
        Schema::table('tutorias_profesores', function (Blueprint $table) {
            $table->tinyInteger('active')->default(0);
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
            $table->dropColumn('active');
        });
        
        Schema::table('acreditaciones_indicadores_licenciaturas', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('acreditaciones_indicadores_posgrados', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('acreditaciones_posgrado', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('anuncios', function (Blueprint $table) {
            $table->dropColumn('active');        
        });
        
        Schema::table('anuncios_categorias', function (Blueprint $table) {
            $table->dropColumn('active');        
        });
        
        Schema::table('becas', function (Blueprint $table) {
            $table->dropColumn('active');        
        });
        
        Schema::table('calendario_categorias', function (Blueprint $table) {
            $table->dropColumn('active');        
        });
        
        Schema::table('calendarios', function (Blueprint $table) {
            $table->dropColumn('active');        
        });
        
        Schema::table('calidad_educativa', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('calidad_educativa_licenciatura', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('calidad_educativa_posgrado', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('disciplinas_deportivas', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('laboratorios', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('licenciaturas', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('materias', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('materias_posgrados', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('noticias', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        
        Schema::table('noticias_categorias', function (Blueprint $table) {
            $table->dropColumn('active');
        });
                
        Schema::table('tutorias_laboratorios', function (Blueprint $table) {
            $table->dropColumn('active');
        });
                
        Schema::table('tutorias_profesores', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
}
