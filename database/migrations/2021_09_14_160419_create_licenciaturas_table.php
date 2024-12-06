<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenciaturas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_licenciatura');
            $table->string('banner_licenciatura')->nullable(); 
            $table->string('nombre_coordinador')->nullable();
            $table->text('informacion_contacto')->nullable();
            $table->string('foto_coordinador')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('duracion')->nullable();
            $table->text('perfil_ingreso')->nullable();
            $table->text('perfil_egreso')->nullable();
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
        Schema::dropIfExists('licenciaturas');
    }
}
