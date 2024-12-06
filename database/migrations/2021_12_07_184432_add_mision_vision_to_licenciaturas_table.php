<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMisionVisionToLicenciaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('licenciaturas', function (Blueprint $table) {
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
        Schema::table('licenciaturas', function (Blueprint $table) {
            $table->dropColumn('mision');
            $table->dropColumn('vision');
        });
    }
}
