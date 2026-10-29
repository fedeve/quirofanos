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
          Schema::table('evaluaciones_anestesicas', function (Blueprint $table) {
            $table->renameColumn('medicamentos', 'alergias');
            $table->renameColumn('medicamentos_valor', 'alergias_valor');            
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
          Schema::table('evaluaciones_anestesicas', function (Blueprint $table) {
            $table->renameColumn('alergias', 'medicamentos');
            $table->renameColumn('alergias_valor', 'medicamentos_valor');
        });
    }
};