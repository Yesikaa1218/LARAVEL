<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesoreriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesoreria', function (Blueprint $table) {
            $table->id();
            $table->text('content_page');
            $table->string('image_description')->nullable();
            $table->string('image')->nullable();
            $table->string('calendario_pagos_posgrado')->nullable();
            $table->string('manual_cuota_interna')->nullable();
            $table->string('solicitud_factura')->nullable();
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
        Schema::dropIfExists('tesoreria');
    }
}
