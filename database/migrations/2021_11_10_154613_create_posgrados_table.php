<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posgrados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_posgrado');
            $table->string('banner_del_posgrado')->nullable(); 
            $table->string('nombre_coordinador_posgrado')->nullable();
            $table->text('informacion_de_contacto_posgrado')->nullable();
            $table->string('foto_del_coordinador')->nullable();
            $table->text('descripcion_general_posgrado')->nullable();
            $table->string('duracion_de_posgrado')->nullable();
            $table->text('perfil_de_ingreso_posgrado')->nullable();
            $table->text('perfil_de_egreso_posgrado')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('posgrados');
    }
}
