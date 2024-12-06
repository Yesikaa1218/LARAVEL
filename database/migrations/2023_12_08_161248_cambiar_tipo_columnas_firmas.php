<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CambiarTipoColumnasFirmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Primero, cambiamos el tipo de columna existente
        Schema::table('FirmasSolicitud', function (Blueprint $table) {
            $table->bigInteger('firmaEscolar')->unsigned()->nullable()->change();
            $table->bigInteger('firmaDocente')->unsigned()->nullable()->change();
            $table->bigInteger('firmaCoordinador')->unsigned()->nullable()->change();
            $table->bigInteger('firmaSubAcademico')->unsigned()->nullable()->change();

            // Luego, agregamos las nuevas columnas como llaves foráneas
            $table->foreign('firmaEscolar')->references('id')->on('empleados');
            $table->foreign('firmaDocente')->references('id')->on('empleados');
            $table->foreign('firmaCoordinador')->references('id')->on('empleados');
            $table->foreign('firmaSubAcademico')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revertimos los cambios en el tipo de columna
        Schema::table('FirmasSolicitud', function (Blueprint $table) {
            $table->string('firmaEscolar', 255)->nullable()->change();
            $table->string('firmaDocente', 255)->nullable()->change();
            $table->string('firmaCoordinador', 255)->nullable()->change();
            $table->string('firmaSubAcademico', 255)->nullable()->change();
            
            // Eliminamos las llaves foráneas
            $table->dropForeign(['firmaEscolar']);
            $table->dropForeign(['firmaDocente']);
            $table->dropForeign(['firmaCoordinador']);
            $table->dropForeign(['firmaSubAcademico']);
        });
    }
}





