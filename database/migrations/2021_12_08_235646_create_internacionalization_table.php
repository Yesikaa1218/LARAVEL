<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternacionalizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internacionalization', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('content_page');
            $table->string('link1')->nullable();
            $table->text('texto_link1')->nullable();
            $table->string('link2')->nullable();
            $table->text('texto_link2')->nullable();
            $table->boolean('active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internacionalization');
    }
}
