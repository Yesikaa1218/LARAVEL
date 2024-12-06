<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoToDeportivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deportivo', function (Blueprint $table) {
            $table->text('content_page');
            $table->string('image')->nullable();
            $table->string('image_description')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::table('deportivo', function (Blueprint $table) {
            $table->dropColumn('content_page');
            $table->dropColumn('image');
            $table->dropColumn('image_description');
            $table->dropColumn('active');
        });
    }
}
