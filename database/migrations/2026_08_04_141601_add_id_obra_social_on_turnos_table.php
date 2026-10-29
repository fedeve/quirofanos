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
            $table->integer('id_obra_social')->unsigned()->nullable()->after('id_profesional_afin');
            
        });

          Schema::table('turnos', function (Blueprint $table) {
      $table->foreign('id_obra_social')->references('id')->on('obras_sociales')
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
            $table->dropColumn('id_obra_social');
        });
    }
};
