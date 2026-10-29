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
    Schema::create('evaluaciones_anestesicas', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('id_profesional')->unsigned()->nullable();
      $table->integer('id_obra_social')->unsigned()->nullable();
      $table->integer('id_institucion')->unsigned()->nullable();

      $table->integer('id_turno')->unsigned()->nullable();
      $table->date('fecha_consulta')->nullable();

      $table->text('dni_paciente')->nullable();
      $table->text('nombre_paciente')->nullable();
      $table->text('numero_afiliado')->nullable();
      $table->integer('edad_paciente')->nullable();
      $table->float('peso_paciente')->nullable();
      $table->float('talla_paciente')->nullable();

      $table->text('observacion')->nullable();

      //cardiovascular
      $table->text('hipertension')->nullable();
      $table->text('arritmias')->nullable();
      $table->text('angor_est_cf')->nullable();
      $table->text('angor_inest')->nullable();
      $table->text('iam_tiempo')->nullable();
      $table->text('valvulopatia')->nullable();
      $table->text('disnea_cf_cardio')->nullable();
      $table->text('cirugia_card_tiempo')->nullable();
      $table->text('marcapaso')->nullable();
      $table->text('edemas')->nullable();
      $table->text('varices')->nullable();

      //respiratorio
      $table->text('asma')->nullable();
      $table->text('epoc')->nullable();
      $table->text('tabaco')->nullable();
      $table->integer('tabaco_cant')->nullable();
      $table->date('tabaco_desde')->nullable();
      $table->text('tos')->nullable();
      $table->text('expectoracion')->nullable();
      $table->text('disnea_cf_respi')->nullable();

      //ocular
      $table->string('glaucoma')->nullable();
      $table->string('lentes_contacto')->nullable();

      //gastrointestinal
      $table->text('sme_acido_sensitivo')->nullable();
      $table->text('hernia_hiato_reflujo')->nullable();
      $table->text('oclusion')->nullable();
      $table->text('insuf_hepatica')->nullable();
      $table->text('hepatitis_tipo')->nullable();
      $table->text('cirrosis')->nullable();
      $table->text('ictericia_colectasis')->nullable();

      //urinario
      $table->text('insuf_renal_cronica')->nullable();
      $table->text('insuf_renal_aguda')->nullable();
      $table->text('dialisis_frec')->nullable();
      $table->date('dialisis_frec_ultima')->nullable();
      $table->text('incontinensia')->nullable();
      $table->text('disuria_polaquiuria')->nullable();

      //alergias
      $table->text('medicamentos')->nullable();

      //otras
      $table->text('otras_1')->nullable();
      $table->text('otras_1_valor')->nullable(); //la muevo a ENF. CONECTIVO
      $table->text('otras_2')->nullable();
      $table->text('otras_2_valor')->nullable();

      //endocrino metab
      $table->text('obesidad')->nullable();
      $table->text('diabetes_tipo')->nullable();
      $table->text('hipertiroidismo')->nullable();
      $table->text('hipotiroidismo')->nullable();
      $table->text('suprarrenales')->nullable();
      $table->text('desnutricion')->nullable();
      $table->text('deshidratacion')->nullable();
      $table->text('hipertemia')->nullable();
      $table->text('alcoholismo')->nullable();
      $table->text('alcoholismo_cant')->nullable();

      //neuromuscular
      $table->text('acv')->nullable();
      $table->text('ait')->nullable();
      $table->text('paresias')->nullable();
      $table->text('parestesias')->nullable();
      $table->text('afasias')->nullable();
      $table->text('convulsiones')->nullable();
      $table->text('hipert_endocraneana')->nullable();
      $table->text('niopatias')->nullable();

      //hematologia
      $table->text('anemia')->nullable();
      $table->text('coagulopatias')->nullable();
      $table->text('transfusiones')->nullable();
      $table->text('testigo_jehova')->nullable();
      $table->text('psiquiatricos')->nullable();
      //enf tej conectivo
      $table->text('les')->nullable();
      $table->text('ar')->nullable();
      $table->text('sme_antifosfolipidos')->nullable();

      //antec ginecobstet
      $table->text('fum')->nullable();
      $table->text('embarazos')->nullable();
      $table->text('abortos')->nullable();
      $table->text('eclampsia')->nullable();
      $table->text('pre_eclampsia_aco')->nullable();
      $table->text('pre_eclampsia')->nullable();

      $table->text('tratamientos')->nullable();

      $table->text('ayuno')->nullable();
      //antecedentes antest
      $table->text('propios')->nullable();
      $table->text('complicaciones')->nullable();
      $table->text('fliares_complic')->nullable();
      $table->text('complicaciones_desc')->nullable();
      $table->text('fliares_complic_desc')->nullable();

      //examen fisico
      $table->text('ta')->nullable();
      $table->text('ausc_pulmonar')->nullable();
      $table->text('ausc_cardiaca')->nullable();
      $table->text('pulso')->nullable();
      $table->text('columna')->nullable();
      $table->text('venas')->nullable();

      //intubacion
      $table->text('ap_bucal')->nullable();
      $table->text('malampatti')->nullable();
      $table->text('dist_tiroment')->nullable();
      $table->text('dist_gonioment')->nullable();
      $table->text('mov_cuello')->nullable();
      $table->text('dentadura')->nullable();
      //estado psqiquiatrico
      $table->text('estado_psiquico_preoc')->nullable();
      //laboratorio
      $table->text('hto')->nullable();
      $table->text('uremia')->nullable();
      $table->text('creat')->nullable();
      $table->text('colin')->nullable();
      $table->text('na_mas')->nullable();
      $table->text('k_mas')->nullable();
      $table->text('hb')->nullable();
      $table->text('gluc')->nullable();
      $table->text('gb')->nullable();
      $table->text('tp')->nullable();
      $table->text('kptt')->nullable();
      $table->text('plac')->nullable();

      //examen cardio vascular
      $table->text('ecg')->nullable();
      $table->text('r_quirugico_goldman')->nullable();
      $table->text('otros')->nullable();

      $table->text('plan_anestesico')->nullable();
      $table->text('interconsulta')->nullable();

      $table->timestamps();
      $table->softDeletes();
    });

    Schema::table('evaluaciones_anestesicas', function (Blueprint $table) {
      $table->foreign('id_profesional')->references('id')->on('profesionales')
        ->onDelete('restrict')
        ->onUpdate('cascade');

      $table->foreign('id_institucion')->references('id')->on('instituciones')
        ->onDelete('restrict')
        ->onUpdate('cascade');

      $table->foreign('id_obra_social')->references('id')->on('obras_sociales')
        ->onDelete('restrict')
        ->onUpdate('cascade');

           $table->foreign('id_turno')->references('id')->on('turnos')
        ->onDelete('restrict')
        ->onUpdate('cascade');
    });

    Schema::create('evaluaciones_anestesicas_practicas', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('id_evaluacion')->unsigned();
      $table->integer('id_practica')->unsigned()->nullable();

      $table->timestamps();
      $table->softDeletes();
    });

    Schema::table('evaluaciones_anestesicas_practicas', function (Blueprint $table) {
      $table->foreign('id_evaluacion')->references('id')->on('evaluaciones_anestesicas')
        ->onDelete('restrict')
        ->onUpdate('cascade');

      $table->foreign('id_practica')->references('id')->on('practicas')
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
     Schema::dropIfExists('evaluaciones_anestesicas_practicas');
    Schema::dropIfExists('evaluaciones_anestesicas');
   
  }
};
