<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMisionVisionToPosgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posgrados', function (Blueprint $table) {
            $table->text('mision')->nullable();
            $table->text('vision')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posgrados', function (Blueprint $table) {
            $table->dropColumn('mision');
            $table->dropColumn('vision');
        });
    }
}
