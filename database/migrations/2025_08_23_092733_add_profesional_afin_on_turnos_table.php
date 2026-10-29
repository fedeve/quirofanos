<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('turnos', function (Blueprint $table) {
            $table->integer('id_profesional_afin')->unsigned()->nullable()->after('id_tipos_turno');
        });
         Schema::table('turnos', function (Blueprint $table) {
            $table->foreign('id_profesional_afin')->references('id')->on('profesionales_afines')
                ->onDelete('restrict')
                ->onUpdate('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
          Schema::table('turnos', function (Blueprint $table) {
            $table->dropColumn('id_profesional_afin');
        });
    }
};
