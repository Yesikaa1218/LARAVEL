<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiaNuevoIngresosTable extends Migration
{
    public function up()
    {
        Schema::create('guia_nuevo_ingreso', function (Blueprint $table) {
            $table->bigIncrements('id'); // Cambiado a bigIncrements para bigint
            $table->text('content_page')->nullable(false);
            $table->tinyInteger('active')->default(0)->nullable(false);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guia_nuevo_ingreso');
    }
}
