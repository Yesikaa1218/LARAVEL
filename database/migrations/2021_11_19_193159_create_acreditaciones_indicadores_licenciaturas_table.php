<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcreditacionesIndicadoresLicenciaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acreditaciones_indicadores_licenciaturas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('valor');
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('licenciatura_id');
            $table->foreign('licenciatura_id')
                            ->references('id')->on('licenciaturas')
                            ->onDelete('cascade');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acreditaciones_indicadores_licenciaturas');
    }
}
