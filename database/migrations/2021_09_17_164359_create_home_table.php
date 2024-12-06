<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HomeTable', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('texto_primario_home');
            $table->string('texto_secundario_home');
            $table->string('titulo_mensaje_director_home');
            $table->string('nombre_director_home');
            $table->string('mensaje_director_home');
            $table->string('imagen_director_home'); // NO SABEMOS EL TIPO DE DATO DE LA IMAGEN (NO TQM PAZOS)
            $table->string('imagen_previsalizacion_home'); // NO SABEMOS EL TIPO DE DATO DE LA IMAGEN (NO TQM PAZOS)
            $table->string('texto_overlay_home');
            $table->string('link_video_home');
            $table->string('enlaces_de_interes_lema');
            $table->string('enlaces_de_interes_titulo');
            $table->string('enlaces_fondo_icono'); // NO SABEMOS EL TIPO DE DATO DE LA IMAGEN (NO TQM PAZOS)
            $table->string('enlace_categoria_1_imagen'); // NO SABEMOS EL TIPO DE DATO DE LA IMAGEN (NO TQM PAZOS)
            $table->string('enlace_categoria1');
            $table->string('enlace_categoria_2_imagen'); // NO SABEMOS EL TIPO DE DATO DE LA IMAGEN (NO TQM PAZOS)
            $table->string('enlace_categoria2');
            $table->string('enlace_categoria_3_imagen'); // NO SABEMOS EL TIPO DE DATO DE LA IMAGEN (NO TQM PAZOS)
            $table->string('enlace_categoria3');
            $table->string('enlace_categoria_4_imagen'); // NO SABEMOS EL TIPO DE DATO DE LA IMAGEN (NO TQM PAZOS)
            $table->string('enlace_categoria4');
            $table->string('enlace_categoria_5_imagen'); // NO SABEMOS EL TIPO DE DATO DE LA IMAGEN (NO TQM PAZOS)
            $table->string('enlace_categoria5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HomeTable');
    }
}
