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
             Schema::table('profesionales', function (Blueprint $table) {
             $table->text('firma')->nullable()->after('minutos_hab'); 
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
          Schema::table('profesionales', function (Blueprint $table) {            
            $table->dropColumn('firma');        
        });
    }
};
