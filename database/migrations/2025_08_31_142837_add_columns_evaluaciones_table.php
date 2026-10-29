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
            $table->renameColumn('otras_1_valor', 'otras_enf_con'); //enf tej conectivo
            $table->renameColumn('pulso', 'frec_cardiaca'); //enf tej conectivo
            $table->dropColumn('fum');
        });

        Schema::table('evaluaciones_anestesicas', function (Blueprint $table) {
            $table->text('disnea_cf_cardio_valor')->nullable()->after('disnea_cf_cardio'); //cardio
            $table->text('disnea_cf_respi_valor')->nullable()->after('disnea_cf_respi'); //respira

            $table->text('medicamentos_valor')->nullable()->after('medicamentos'); //alergias
            $table->text('diabetes')->nullable()->after('diabetes_tipo'); //endocrino
            $table->text('dislipemia')->nullable()->after('diabetes'); //endocrino
            $table->text('sme_metabolico')->nullable()->after('dislipemia'); //endocrino

            $table->text('coagulopatias_valor')->nullable()->after('coagulopatias'); //hematologia
            $table->text('transfusiones_valor')->nullable()->after('transfusiones'); //hematologia
            $table->dateTime('transfusiones_fecha')->nullable()->after('transfusiones_valor'); //hematologia

            $table->dateTime('fum')->nullable()->after('transfusiones_fecha'); //antec ginecobstet
            $table->text('embarazos_valor')->nullable()->after('embarazos'); //antec ginecobstet
            $table->text('abortos_valor')->nullable()->after('abortos'); //antec ginecobstet


            $table->text('dbt_gestacional')->nullable()->after('pre_eclampsia'); //antec ginecobstet
            $table->text('hta')->nullable()->after('dbt_gestacional'); //antec ginecobstet
            $table->text('acretismo')->nullable()->after('hta'); //antec ginecobstet
            $table->text('placenta_previa')->nullable()->after('acretismo'); //antec ginecobstet
            $table->text('parto_prematuro')->nullable()->after('placenta_previa'); //antec ginecobstet
            $table->text('hellp')->nullable()->after('parto_prematuro'); //antec ginecobstet

            $table->text('ayuno_valor')->nullable()->after('ayuno'); // ayuno

            $table->text('propios_valor')->nullable()->after('propios');

            //examen fisico

            $table->text('ausc_cardiaca_valor')->nullable()->after('ausc_cardiaca');

            $table->text('columna_valor')->nullable()->after('columna');
            $table->text('venas_valor')->nullable()->after('venas');
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

            $table->dropColumn('disnea_cf_cardio_valor');
            $table->dropColumn('disnea_cf_respi_valor');
            $table->dropColumn('medicamentos_valor');

            $table->dropColumn('diabetes');
            $table->dropColumn('dislipemia');
            $table->dropColumn('sme_metabolico');

            $table->dropColumn('coagulopatias_valor');
            $table->dropColumn('transfusiones_valor');
            $table->dropColumn('transfusiones_fecha');

            $table->dropColumn('fum');
            $table->dropColumn('embarazos_valor');
            $table->dropColumn('abortos_valor');

            $table->dropColumn('dbt_gestacional');
            $table->dropColumn('hta');
            $table->dropColumn('acretismo');
            $table->dropColumn('placenta_previa');
            $table->dropColumn('parto_prematuro');

            $table->dropColumn('hellp');
            $table->dropColumn('ayuno_valor');
            $table->dropColumn('propios_valor');

            $table->dropColumn('columna_valor');
            $table->dropColumn('venas_valor');
            $table->dropColumn('ausc_cardiaca_valor');
        });
    }
};
