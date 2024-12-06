<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcreditacionesLicenciaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acreditaciones_licenciatura', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_acreditacion');
            $table->string('logo_acreditacion');
            $table->tinyInteger('active')->default(0);
            $table->timestamps();
            $table->SoftDeletes();
            $table->unsignedBigInteger('licenciatura_id');
            $table->foreign('licenciatura_id')
                            ->references('id')->on('licenciaturas')
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
        Schema::dropIfExists('acreditaciones_licenciatura');
    }
}
