<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversidadSaludableEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universidad_saludable_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content_page');
            $table->date('date');
            $table->time('hour');
            $table->string('image_description')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('universidad_saludable_eventos');
    }
}
