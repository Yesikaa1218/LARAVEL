<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSrcToConfiguracionLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configuraciones_laboratorio', function (Blueprint $table) {
            $table->string('src')->nullable()->after('height');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuraciones_laboratorio', function (Blueprint $table) {
            $table->dropColumn('src');
        });
    }
}
