@extends('adminlte::page')

@section('title', 'Nueva Evaluacion Anestesica')


@section('content_header')
    <h1>Evaluaciones Anestesicas</h1>
@stop

@section('content')
    <div class="card">
        <div class="cadr-body">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                       
                        @if (isset($evaluacion))
                            {{ Form::model($evaluacion, ['route' => ['admin.evaluaciones_anestesicas.update', $evaluacion->id], 'method' => 'PUT', 'role' => 'form', 'data-toggle' => 'validator', 'files' => true]) }}
                        @else
                            {{ Form::open(['route' => 'admin.evaluaciones_anestesicas.store', 'method' => 'POST', 'role' => 'form', 'data-toggle' => 'validator', 'files' => true]) }}
                        @endif

                        
                       
                         <div class="col-lg-12 form-group">
                        <hr style="background-color:blue ; height: 2px">
                        <h5>Datos del Profesional</h5>
                        </hr>

                        <div class="row">
                            {{ Form::hidden('url_busqueda', $url_busqueda) }}
                            @if (isset($evaluacion->id))
                                <div class="col-lg-6 col-md-6 form-group">
                                    <label for="id">N° Evaluacion</label>
                                    {{ Form::text('id', null, ['id' => 'id', 'class' => 'form-control', 'placeholder' => 'id', 'readonly']) }}
                                </div>
                            @endif
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="id_profesional">Anestesiólogo</label>
                                {{ Form::select('id_profesional', $id_profesional, isset($evaluacion->id_profesional) ? $evaluacion->id_profesional : null, ['id' => 'id_profesional', 'class' => 'form-control select2', 'required']) }}
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5>Datos del Paciente</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="id_obra_social">Obra Social</label>
                                {{ Form::select('id_obra_social', $id_obra_social, isset($evaluacion->id_obra_social) ? $evaluacion->id_obra_social : null, ['id' => 'id_obra_social', 'class' => 'form-control select2', 'required']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="dni_paciente">Nro Documento</label>
                                <br>
                                {{ Form::text('dni_paciente', null, ['id' => 'dni_paciente', 'class' => 'form-control', 'placeholder' => 'DNI Paciente', 'required']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6  form-group">
                                <label for="nombre_paciente">Apellido y Nombres</label>
                                {{ Form::text('nombre_paciente', null, ['id' => 'nombre_paciente', 'class' => 'form-control', 'placeholder' => 'Apellido y Nombres del Paciente', 'required']) }}
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-6 form-group">
                                <label for="numero_afiliado">Numero Afiliado</label>
                                {{ Form::text('numero_afiliado', null, ['id' => 'numero_afiliado', 'class' => 'form-control', 'placeholder' => 'Numero Afiliado']) }}
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-6 form-group">
                                <label for="edad_paciente">Edad</label>
                                {{ Form::number('edad_paciente', null, ['id' => 'edad_paciente', 'class' => 'form-control', 'placeholder' => 'Edad Paciente']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6  form-group">
                                <label for="peso_paciente">Peso</label>
                                {{ Form::text('peso_paciente', null, ['id' => 'peso_paciente', 'class' => 'form-control', 'placeholder' => 'Peso del pPaciente Kg']) }}
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-6 form-group">
                                <label for="talla_paciente">Talla</label>
                                {{ Form::text('talla_paciente', null, ['id' => 'talla_paciente', 'class' => 'form-control', 'placeholder' => 'Talla Afiliado Cm']) }}
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5 class=" box-title"> Datos de Origen</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 form-group has-feedback">
                                <label for="fecha_consulta">Fecha de Consulta</label>
                                <div class="input-group date">
                                    {{ Form::text('fecha_consulta', isset($evaluacion->fecha_consulta) ? $evaluacion->fecha_consulta : null, ['id' => 'fecha_consulta', 'class' => 'form-control', 'placeholder' => 'dd-mm-aaaa']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6  form-group institucion_select">
                                <a class="btn btn-md btn-primary btn-add-institucion" title="Agregar Institucion"
                                    role="button"> <i class="fa fa-plus"></i></a>
                                <label for="id_institucion">Institucion</label>
                                {{ Form::select('id_institucion', $id_institucion, isset($evaluacion->id_institucion) ? $evaluacion->id_institucion : null, ['id' => 'id_institucion', 'class' => ' form-control select2']) }}
                            </div>
                        </div>

                        <div class="row institucion_section">
                            <h5 class="box-title">
                                <a class="btn btn-md btn-warning btn-delete-institucion" title="Seleccionar Institucion"
                                    role="button">
                                    <i class="fa fa-minus"></i> Nueva Institucion</a>
                            </h5>

                            <div class="col-lg-6 col-md-6 col-xs-6 form-group">
                                <label for="denominacion_establecimeinto">Denominacion</label>
                                {{ Form::text('denominacion_establecimeinto', null, ['id' => 'denominacion_establecimeinto', 'class' => 'form-control', 'placeholder' => 'Denominacion del Institucion']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6 form-group">
                                <label for="localidad_institucion">Localidad</label>
                                {{ Form::select('localidad_institucion', $localidad_institucion, isset($evaluacion->localidad_institucion) ? $evaluacion->localidad_institucion : null, ['id' => 'localidad_institucion', 'class' => ' form-control select2']) }}
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5 class=" box-title"> Practicas</h5>
                        </hr>

                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <a class="btn btn-md btn-success btn-add-concepto" title="Agregar Practica" role="button">
                                    <i class="fa fa-plus"></i></a>
                                <a class="btn btn-md btn-danger btn-delete-concepto" title="Borrar Practica" role="button">
                                    <i class="fa fa-minus"></i></a>
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h2 class=" box-title">Clinica Preoperatoria</h2>
                        </hr>

                        <h5 class=" box-title" style="text-align:center;">Cardiovascular</h5>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="hipertension" name="hipertension"
                                        {{ isset($evaluacion) ? $evaluacion->hipertension : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label class="" for="hipertension"> Hipertension</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="arritmias" name="arritmias"
                                        {{ isset($evaluacion) ? $evaluacion->arritmias : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="arritmias"> Arritmias</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="angor_est_cf" name="angor_est_cf"
                                        {{ isset($evaluacion) ? $evaluacion->angor_est_cf : '' }}>
                                    <span class="slider2 round"></span>

                                </label>
                                <label for="angor_est_cf"> Angor. Est. Cf</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="angor_inest" name="angor_inest"
                                        {{ isset($evaluacion) ? $evaluacion->angor_inest : '' }}>
                                    <span class="slider2 round"></span>
                                </label>

                                <label for="angor_inest"> Angor. Inest.</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="iam_tiempo" name="iam_tiempo"
                                        {{ isset($evaluacion) ? $evaluacion->iam_tiempo : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="iam_tiempo"> IAM Tiempo</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="valvulopatia" name="valvulopatia"
                                        {{ isset($evaluacion) ? $evaluacion->valvulopatia : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="valvulopatia"> Valvulopatia</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="cirugia_card_tiempo" name="cirugia_card_tiempo"
                                        {{ isset($evaluacion) ? $evaluacion->cirugia_card_tiempo : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="cirugia_card_tiempo"> Cirugia Card. Tiempo</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="marcapaso" name="marcapaso"
                                        {{ isset($evaluacion) ? $evaluacion->marcapaso : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="marcapaso"> Marcapaso</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="edemas" name="edemas"
                                        {{ isset($evaluacion) ? $evaluacion->edemas : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="edemas"> Edemas</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="varices" name="varices"
                                        {{ isset($evaluacion) ? $evaluacion->varices : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="varices"> Varices</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <label class="switch">
                                    <input type="checkbox" id="disnea_cf_cardio" name="disnea_cf_cardio"
                                        {{ isset($evaluacion) ? $evaluacion->disnea_cf_cardio : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="disnea_cf_cardio"> Disnea CF Cardio</label>
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-xs-6 ">
                                <label for="disnea_cf_cardio_valor">Disnea CF Cardio Tipo</label>
                                {{ Form::select('disnea_cf_cardio_valor', ['' => 'Seleccione', 'I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV'], isset($evaluacion->disnea_cf_cardio_valor) ? $evaluacion->disnea_cf_cardio_valor : null, ['id' => 'disnea_cf_cardio_valor', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Respiratorias</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="asma" name="asma"
                                        {{ isset($evaluacion) ? $evaluacion->asma : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="asma"> Asma</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="epoc" name="epoc"
                                        {{ isset($evaluacion) ? $evaluacion->epoc : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="epoc"> Epoc</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="tos" name="tos"
                                        {{ isset($evaluacion) ? $evaluacion->tos : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="tos"> Tos</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="tabaco" name="tabaco"
                                        {{ isset($evaluacion) ? $evaluacion->tabaco : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="tabaco"> Tabaco</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <label for="tabaco_cant">Tabaco Cant</label>
                                {{ Form::text('tabaco_cant', null, ['id' => 'tabaco_cant', 'class' => 'form-control', 'placeholder' => 'Tabaco Cant']) }}
                            </div>



                            <div class="col-lg-4 col-md-4 col-xs-6 form-group has-feedback">
                                <label for="tabaco_desde">Desde</label>
                                <div class="input-group date">
                                    {{ Form::text('tabaco_desde', isset($evaluacion->tabaco_desde) ? $evaluacion->tabaco_desde : null, ['id' => 'tabaco_desde', 'class' => 'form-control', 'placeholder' => 'dd-mm-aaaa']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="expectoracion" name="expectoracion"
                                        {{ isset($evaluacion) ? $evaluacion->expectoracion : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="expectoracion"> Expectoracion</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="disnea_cf_respi" name="disnea_cf_respi"
                                        {{ isset($evaluacion) ? $evaluacion->disnea_cf_respi : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="disnea_cf_respi"> Disnea CF Respi.</label>
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-xs-6">
                                <label for="disnea_cf_respi_valor">Disnea CF Respi. Tipo</label>
                                {{ Form::select('disnea_cf_respi_valor', ['' => 'Seleccione', 'I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV'], isset($evaluacion->disnea_cf_respi_valor) ? $evaluacion->disnea_cf_respi_valor : null, ['id' => 'disnea_cf_respi_valor', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Ocular</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="glaucoma" name="glaucoma"
                                        {{ isset($evaluacion) ? $evaluacion->glaucoma : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="glaucoma"> Glaucoma</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="lentes_contacto" name="lentes_contacto"
                                        {{ isset($evaluacion) ? $evaluacion->lentes_contacto : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="lentes_contacto"> Lentes de Contacto</label>
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Gastrointestinal</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="sme_acido_sensitivo" name="sme_acido_sensitivo"
                                        {{ isset($evaluacion) ? $evaluacion->sme_acido_sensitivo : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="sme_acido_sensitivo"> Sme. Acido Sensitivo</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="hernia_hiato_reflujo" name="hernia_hiato_reflujo"
                                        {{ isset($evaluacion) ? $evaluacion->hernia_hiato_reflujo : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="hernia_hiato_reflujo"> Hernia Hiato - Reflujo</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="oclusion" name="oclusion"
                                        {{ isset($evaluacion) ? $evaluacion->oclusion : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="oclusion"> Oclusion</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="insuf_hepatica" name="insuf_hepatica"
                                        {{ isset($evaluacion) ? $evaluacion->insuf_hepatica : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="insuf_hepatica"> Insuf. Hepatica</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="hepatitis_tipo" name="hepatitis_tipo"
                                        {{ isset($evaluacion) ? $evaluacion->hepatitis_tipo : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="hepatitis_tipo"> Hepatitis Tipo</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="cirrosis" name="cirrosis"
                                        {{ isset($evaluacion) ? $evaluacion->cirrosis : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="cirrosis"> Cirrosis</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="ictericia_colectasis" name="ictericia_colectasis"
                                        {{ isset($evaluacion) ? $evaluacion->ictericia_colectasis : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="ictericia_colectasis"> Ictericia - Colectasis</label>
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Urinario</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="insuf_renal_cronica" name="insuf_renal_cronica"
                                        {{ isset($evaluacion) ? $evaluacion->insuf_renal_cronica : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="insuf_renal_cronica"> Insuf. Renal Cronica</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="insuf_renal_aguda" name="insuf_renal_aguda"
                                        {{ isset($evaluacion) ? $evaluacion->insuf_renal_aguda : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="insuf_renal_aguda"> Insuf. Renal Aguda</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="incontinensia" name="incontinensia"
                                        {{ isset($evaluacion) ? $evaluacion->incontinensia : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="incontinensia"> Incontinencia</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="disuria_polaquiuria" name="disuria_polaquiuria"
                                        {{ isset($evaluacion) ? $evaluacion->disuria_polaquiuria : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="disuria_polaquiuria"> Disuria Polaquiuria</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="dialisis_frec" name="dialisis_frec"
                                        {{ isset($evaluacion) ? $evaluacion->dialisis_frec : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="dialisis_frec"> Dialisis Frec.</label>
                            </div>


                            <div class="col-lg-4 col-md-4 col-xs-6 form-group has-feedback">
                                <label for="dialisis_frec_ultima">Ultima Dialisis</label>
                                <div class="input-group date">
                                    {{ Form::text('dialisis_frec_ultima', isset($evaluacion->dialisis_frec_ultima) ? $evaluacion->dialisis_frec_ultima : null, ['id' => 'dialisis_frec_ultima', 'class' => 'form-control', 'placeholder' => 'dd-mm-aaaa']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Alergias</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="alergias" name="alergias"
                                        {{ isset($evaluacion) ? $evaluacion->alergias : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="alergias"> Alergias</label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6 form-group sliderlabel">
                                <label for="alergias">Alergias Cuales?</label>
                                <!-- Rounded switch -->
                                {{ Form::text('alergias_valor', null, ['id' => 'alergias_valor', 'class' => 'form-control', 'placeholder' => 'Alergias Cuales?']) }}
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Otras</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 form-group sliderlabel">
                                <!-- Rounded switch -->
                                {{ Form::text('otras_1', null, ['id' => 'otras_1', 'class' => 'form-control', 'placeholder' => 'Otras']) }}
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Endocrino Metab.</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="obesidad" name="obesidad"
                                        {{ isset($evaluacion) ? $evaluacion->obesidad : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="obesidad"> Obesidad</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="diabetes" name="diabetes"
                                        {{ isset($evaluacion) ? $evaluacion->diabetes : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="diabetes"> Diabetes</label>
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-xs-6">
                                <label for="diabetes_tipo">Diabetes Tipo</label>
                                {{ Form::select('diabetes_tipo', ['' => 'Seleccione', 'I' => 'I', 'II' => 'II'], isset($evaluacion->diabetes_tipo) ? $evaluacion->diabetes_tipo : null, ['id' => 'diabetes_tipo', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="dislipemia" name="dislipemia"
                                        {{ isset($evaluacion) ? $evaluacion->dislipemia : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="dislipemia"> Dislipemia</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="sme_metabolico" name="sme_metabolico"
                                        {{ isset($evaluacion) ? $evaluacion->sme_metabolico : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="sme_metabolico"> SME METABOLICO</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="hipertiroidismo" name="hipertiroidismo"
                                        {{ isset($evaluacion) ? $evaluacion->hipertiroidismo : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="hipertiroidismo"> Hipertiroidismo</label>
                            </div>


                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="hipotiroidismo" name="hipotiroidismo"
                                        {{ isset($evaluacion) ? $evaluacion->hipotiroidismo : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="hipotiroidismo"> Hipotiroidismo</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="suprarrenales" name="suprarrenales"
                                        {{ isset($evaluacion) ? $evaluacion->suprarrenales : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="suprarrenales"> Suprarrenales</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="desnutricion" name="desnutricion"
                                        {{ isset($evaluacion) ? $evaluacion->desnutricion : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="desnutricion"> Desnutricion</label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="deshidratacion" name="deshidratacion"
                                        {{ isset($evaluacion) ? $evaluacion->deshidratacion : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="deshidratacion"> Deshidratacion</label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="hipertemia" name="hipertemia"
                                        {{ isset($evaluacion) ? $evaluacion->hipertemia : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="hipertemia"> Hipertemia</label>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="alcoholismo" name="alcoholismo"
                                        {{ isset($evaluacion) ? $evaluacion->alcoholismo : '' }}>
                                    <span class="slider2 round"></span>

                                </label>
                                <label for="alcoholismo"> Alcoholismo</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <label for="alcoholismo_cant">Alcoholismo Cant</label>
                                {{ Form::text('alcoholismo_cant', null, ['id' => 'alcoholismo_cant', 'class' => 'form-control', 'placeholder' => 'Alcoholismo Cant']) }}
                            </div>
                        </div>


                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Neuromuscular</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="acv" name="acv"
                                        {{ isset($evaluacion) ? $evaluacion->acv : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="acv"> ACV</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="ait" name="ait"
                                        {{ isset($evaluacion) ? $evaluacion->ait : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="ait"> AIT</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="paresias" name="paresias"
                                        {{ isset($evaluacion) ? $evaluacion->paresias : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="paresias"> Paresias</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="parestesias" name="parestesias"
                                        {{ isset($evaluacion) ? $evaluacion->parestesias : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="parestesias"> parestesias</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="afasias" name="afasias"
                                        {{ isset($evaluacion) ? $evaluacion->afasias : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="afasias"> afasias</label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="convulsiones" name="convulsiones"
                                        {{ isset($evaluacion) ? $evaluacion->convulsiones : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="convulsiones"> Convulsiones</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="hipert_endocraneana" name="hipert_endocraneana"
                                        {{ isset($evaluacion) ? $evaluacion->hipert_endocraneana : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="hipert_endocraneana"> Hipert Endocraneana</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="niopatias" name="niopatias"
                                        {{ isset($evaluacion) ? $evaluacion->niopatias : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="niopatias"> Miopatias</label>
                            </div>

                        </div>





                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Hematologia</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="anemia" name="anemia"
                                        {{ isset($evaluacion) ? $evaluacion->anemia : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="anemia"> Anemia</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="coagulopatias" name="coagulopatias"
                                        {{ isset($evaluacion) ? $evaluacion->coagulopatias : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="coagulopatias"> Coagulopatias</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-12 form-group">
                                <label for="coagulopatias_valor"> Coagulopatia Cual?</label>
                                {{ Form::text('coagulopatias_valor', null, ['id' => 'coagulopatias_valor', 'class' => 'form-control', 'placeholder' => 'Coagulopatia Cual?']) }}
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="transfusiones" name="transfusiones"
                                        {{ isset($evaluacion) ? $evaluacion->transfusiones : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="transfusiones"> Transfusiones</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group has-feedback">
                                <label for="transfusiones_fecha">Ultima Transfusion</label>
                                <div class="input-group date">
                                    {{ Form::text('transfusiones_fecha', isset($evaluacion->transfusiones_fecha) ? $evaluacion->transfusiones_fecha : null, ['id' => 'transfusiones_fecha', 'class' => 'form-control', 'placeholder' => 'dd-mm-aaaa']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12 form-group">
                                <label for="transfusiones_valor"> Transfusion Cual?</label>
                                {{ Form::text('transfusiones_valor', null, ['id' => 'transfusiones_valor', 'class' => 'form-control', 'placeholder' => 'Transfusion Cual?']) }}
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="testigo_jehova" name="testigo_jehova"
                                        {{ isset($evaluacion) ? $evaluacion->testigo_jehova : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="testigo_jehova"> Testigo de Jehova</label>
                            </div>
                        </div>


                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Enf. Tej. Conectivo</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="les" name="les"
                                        {{ isset($evaluacion) ? $evaluacion->les : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="les"> L.E.S.</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="ar" name="ar"
                                        {{ isset($evaluacion) ? $evaluacion->ar : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="ar"> A.R.</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="sme_antifosfolipidos" name="sme_antifosfolipidos"
                                        {{ isset($evaluacion) ? $evaluacion->sme_antifosfolipidos : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="sme_antifosfolipidos"> SME. Antifosfolipidos</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group">
                                <label for="otras_enf_con"> Otras</label>
                                {{ Form::text('otras_enf_con', null, ['id' => 'otras_enf_con', 'class' => 'form-control', 'placeholder' => 'Otras']) }}
                            </div>


                        </div>





                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Antecedentes Gineco-obstétricos</h5>
                        </hr>


                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="embarazos" name="embarazos"
                                        {{ isset($evaluacion) ? $evaluacion->embarazos : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="embarazos"> Embarazos</label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group">
                                <label for="embarazos_valor"> Embarazos Cuantos?</label>
                                {{ Form::text('embarazos_valor', null, ['id' => 'embarazos_valor', 'class' => 'form-control', 'placeholder' => 'Embarazos Cantidad']) }}
                            </div>


                            <div class="col-lg-4 col-md-4 col-xs-6 form-group has-feedback">
                                <label for="fum">F.U.M.</label>
                                <div class="input-group date">
                                    {{ Form::text('fum', isset($evaluacion->fum) ? $evaluacion->fum : null, ['id' => 'fum', 'class' => 'form-control', 'placeholder' => 'dd-mm-aaaa']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="abortos" name="abortos"
                                        {{ isset($evaluacion) ? $evaluacion->abortos : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="abortos"> Abortos</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group">
                                <label for="abortos_valor"> Abortos Cuantos?</label>
                                {{ Form::text('abortos_valor', null, ['id' => 'abortos_valor', 'class' => 'form-control', 'placeholder' => 'Abortos Cantidad']) }}
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="eclampsia" name="eclampsia"
                                        {{ isset($evaluacion) ? $evaluacion->eclampsia : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="eclampsia"> Eclampsia</label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="pre_eclampsia_aco" name="pre_eclampsia_aco"
                                        {{ isset($evaluacion) ? $evaluacion->pre_eclampsia_aco : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="pre_eclampsia_aco"> Pre Eclampsia A.C.O.</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="dbt_gestacional" name="dbt_gestacional"
                                        {{ isset($evaluacion) ? $evaluacion->dbt_gestacional : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="dbt_gestacional"> DBT Gestacional</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="hta" name="hta"
                                        {{ isset($evaluacion) ? $evaluacion->hta : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="hta"> HTA</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="acretismo" name="acretismo"
                                        {{ isset($evaluacion) ? $evaluacion->acretismo : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="acretismo"> Acretismo</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="placenta_previa" name="placenta_previa"
                                        {{ isset($evaluacion) ? $evaluacion->placenta_previa : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="abortos"> Placenta Previa</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="parto_prematuro" name="parto_prematuro"
                                        {{ isset($evaluacion) ? $evaluacion->parto_prematuro : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="parto_prematuro"> Parto Prematuro</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="hellp" name="hellp"
                                        {{ isset($evaluacion) ? $evaluacion->hellp : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="hellp"> H.E.L.L.P.</label>
                            </div>
                        </div>




                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Ayuno</h5>
                        </hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="ayuno" name="ayuno"
                                        {{ isset($evaluacion) ? $evaluacion->ayuno : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="ayuno"> Ayuno</label>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 form-group sliderlabel">
                                <label for="ayuno_valor">Ayuno Cant</label>
                                {{ Form::text('ayuno_valor', null, ['id' => 'ayuno_valor', 'class' => 'form-control', 'placeholder' => 'Ayuno Cant']) }}
                            </div>
                        </div>




                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Antecedentes Anestes.</h5>
                        </hr>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="propios" name="propios"
                                        {{ isset($evaluacion) ? $evaluacion->propios : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="propios"> Propios</label>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-xs-6 ">
                                <label for="propios_valor">Propios Tipo</label>
                                {{ Form::select('propios_valor', ['' => 'Seleccione', 'General' => 'General', 'Regional' => 'Regional'], isset($evaluacion->propios_valor) ? $evaluacion->propios_valor : null, ['id' => 'propios_valor', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-xs-6 form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="complicaciones" name="complicaciones"
                                        {{ isset($evaluacion) ? $evaluacion->complicaciones : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="complicaciones"> Complicaciones</label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6  form-group sliderlabel">
                                <label for="complicaciones_desc">Complicaciones</label>
                                {{ Form::text('complicaciones_desc', null, ['id' => 'complicaciones_desc', 'class' => 'form-control', 'placeholder' => 'Complicaciones Describir']) }}
                            </div>

                            <div class="col-lg-6 col-md-6 col-xs-6  form-group sliderlabel">

                                <!-- Rounded switch -->
                                <label class="switch">
                                    <input type="checkbox" id="fliares_complic" name="fliares_complic"
                                        {{ isset($evaluacion) ? $evaluacion->fliares_complic : '' }}>
                                    <span class="slider2 round"></span>
                                </label>
                                <label for="fliares_complic">Fliares. Complicaciones</label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6  form-group sliderlabel">
                                <label for="fliares_complic_desc">Fliares. Complicaciones</label>
                                {{ Form::text('fliares_complic_desc', null, ['id' => 'fliares_complic_desc', 'class' => 'form-control', 'placeholder' => 'Flieares. Complicaciones Describir']) }}
                            </div>
                        </div>





                        <hr style="background-color:blue ; height: 2px">
                        <h5 style="text-align:center;" class=" box-title">Medicación Actual</h5>
                        </hr>
                        <div class="row">
                            <div class="col-sm-12  form-group has-feedback">
                                <label for="tratamientos">Medicación Actual </label>
                                <textarea class="form-control" name="tratamientos" id="tratamientos" rows="3"
                                    placeholder="Medicación Actual">{{ isset($evaluacion) ? $evaluacion->tratamientos : '' }}</textarea>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>


                        <hr style="background-color:blue ; height: 2px">
                        <h2 style="text-align:center;" class=" box-title">Examen Físico</h2>
                        </hr>


                        <div class="row">
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="ta">T.A.</label>
                                {{ Form::text('ta', null, ['id' => 'ta', 'class' => 'form-control', 'placeholder' => 'T.A.']) }}
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="ausc_pulmonar">Ausc. Pulmonar</label>
                                {{ Form::select('ausc_pulmonar', ['Normal' => 'Normal B.E.A.B.', 'Patologica' => 'Patologica'], isset($evaluacion->ausc_pulmonar) ? $evaluacion->ausc_pulmonar : null, ['id' => 'ausc_pulmonar', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="ausc_pulmonar_valor">Ausc. Pulmonar Describir</label>
                                {{ Form::text('ausc_pulmonar_valor', null, ['id' => 'ausc_pulmonar_valor', 'class' => 'form-control', 'placeholder' => 'Ausc. Pulmonar Describir']) }}
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="ausc_cardiaca">Ausc. Cardiaca</label>
                                {{ Form::select('ausc_cardiaca', ['Normal' => 'Normal', 'Patologica' => 'Patologica'], isset($evaluacion->ausc_cardiaca) ? $evaluacion->ausc_cardiaca : null, ['id' => 'ausc_cardiaca', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="ausc_cardiaca_valor">Ausc. Cardiaca Describir</label>
                                {{ Form::text('ausc_cardiaca_valor', null, ['id' => 'ausc_cardiaca_valor', 'class' => 'form-control', 'placeholder' => 'Ausc. Cardiaca Describir']) }}
                            </div>


                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="frec_cardiaca">Frecuencia Cardiaca</label>
                                {{ Form::text('frec_cardiaca', null, ['id' => 'frec_cardiaca', 'class' => 'form-control', 'placeholder' => 'Frecuencia Cardiaca']) }}
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="columna">Columna</label>
                                {{ Form::select('columna', ['S/P' => 'S/P', 'Patológica' => 'Patológica'], isset($evaluacion->columna) ? $evaluacion->columna : null, ['id' => 'columna', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="columna_valor">Columna Cual?</label>
                                {{ Form::text('columna_valor', null, ['id' => 'columna_valor', 'class' => 'form-control', 'placeholder' => 'Columna Completar']) }}
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="venas">Venas</label>
                                {{ Form::select('venas', ['S/P' => 'S/P', 'Patológica' => 'Patológica'], isset($evaluacion->venas) ? $evaluacion->venas : null, ['id' => 'venas', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="venas_valor">Venas Cual</label>
                                {{ Form::text('venas_valor', null, ['id' => 'venas_valor', 'class' => 'form-control', 'placeholder' => 'Venas Completar']) }}
                            </div>
                        </div>



                        <hr style="background-color:blue ; height: 2px">
                        <h2 style="text-align:center;" class=" box-title">Intubación</h2>
                        </hr>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="ap_bucal">Ap. Bucal</label>
                                {{ Form::text('ap_bucal', null, ['id' => 'ap_bucal', 'class' => 'form-control', 'placeholder' => 'Ap. Bucal']) }}
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="malampatti">Malampatti</label>
                                {{ Form::select('malampatti', ['I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV'], isset($evaluacion->malampatti) ? $evaluacion->malampatti : null, ['id' => 'malampatti', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="dist_tiroment">Dist. Tiroment.</label>
                                {{ Form::select('dist_tiroment', ['> 6' => '> 6', '< 6' => '< 6'], isset($evaluacion->dist_tiroment) ? $evaluacion->dist_tiroment : null, ['id' => 'dist_tiroment', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                            </div>

                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="dist_gonioment">Dist. Gonioment</label>
                                {{ Form::text('dist_gonioment', null, ['id' => 'dist_gonioment', 'class' => 'form-control', 'placeholder' => 'Dist. Gonioment']) }}
                            </div>

                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="mov_cuello">Mov Cuello</label>
                                {{ Form::text('mov_cuello', null, ['id' => 'mov_cuello', 'class' => 'form-control', 'placeholder' => 'Mov Cuello']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="dentadura">Dentadura</label>
                                {{ Form::text('dentadura', null, ['id' => 'dentadura', 'class' => 'form-control', 'placeholder' => 'Dentadura']) }}
                            </div>

                        </div>



                        <div class="row">

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="estado_psiquico_preoc">Estado Psiquico Preop.</label>
                                {{ Form::select(
                                    'estado_psiquico_preoc',
                                    [
                                        'Normal' => 'Normal',
                                        'Deprimido' => 'Deprimido',
                                        'Ansioso' => 'Ansioso',
                                        'Exitado' => 'Exitado',
                                        'Comatoso' => 'Comatoso',
                                        'Hiperemotivo' => 'Hiperemotivo',
                                    ],
                                    isset($evaluacion->estado_psiquico_preoc) ? $evaluacion->estado_psiquico_preoc : null,
                                    ['id' => 'estado_psiquico_preoc', 'class' => 'form-control'],
                                ) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>



                        <hr style="background-color:blue ; height: 2px">
                        <h2 style="text-align:center;" class=" box-title">Laboratorio</h2>
                        </hr>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="hto">Hto</label>
                                {{ Form::text('hto', null, ['id' => 'hto', 'class' => 'form-control', 'placeholder' => 'Hto']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="uremia">Uremia</label>
                                {{ Form::text('uremia', null, ['id' => 'uremia', 'class' => 'form-control', 'placeholder' => 'Uremia']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="creat">Creat.</label>
                                {{ Form::text('creat', null, ['id' => 'creat', 'class' => 'form-control', 'placeholder' => 'Creat.']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="colin">Colin</label>
                                {{ Form::text('colin', null, ['id' => 'colin', 'class' => 'form-control', 'placeholder' => 'Colin']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="na_mas">Na +</label>
                                {{ Form::text('na_mas', null, ['id' => 'na_mas', 'class' => 'form-control', 'placeholder' => 'Na +']) }}
                            </div>

                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="k_mas">K +</label>
                                {{ Form::text('k_mas', null, ['id' => 'k_mas', 'class' => 'form-control', 'placeholder' => 'K +']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="hb">HB</label>
                                {{ Form::text('hb', null, ['id' => 'hb', 'class' => 'form-control', 'placeholder' => 'HB']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="gluc">Gluc.</label>
                                {{ Form::text('gluc', null, ['id' => 'gluc', 'class' => 'form-control', 'placeholder' => 'Gluc.']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="gb">G.B.</label>
                                {{ Form::text('gb', null, ['id' => 'gb', 'class' => 'form-control', 'placeholder' => 'G.B.']) }}
                            </div>

                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="tp">T.P.</label>
                                {{ Form::text('tp', null, ['id' => 'tp', 'class' => 'form-control', 'placeholder' => 'T.P.']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="kptt">KPTT.</label>
                                {{ Form::text('kptt', null, ['id' => 'kptt', 'class' => 'form-control', 'placeholder' => 'KPTT.']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="plac">Plaq.</label>
                                {{ Form::text('plac', null, ['id' => 'plac', 'class' => 'form-control', 'placeholder' => 'Plaq.']) }}
                            </div>
                        </div>



                        <div class="row">
                            <div class="info-box bg-red col-lg-12 col-md-12 col-xs-12 ">
                                <label for="Archivo_Adjunto_Lab">Adjuntar Laboratorio</label>
                                <input type="file" class="form-control"
                                    title="Arrastre el Archivo o Haga click para seleccionar" id="Archivo_Adjunto_Lab[]"
                                    name="Archivo_Adjunto_Lab[]" multiple="">



                            </div>
                        </div>
                        @foreach ($archivos_laboratorios as $archivo_lab)
                            <div class="row">
                                <div class="info-box bg-red col-lg-4 col-md-6 col-xs-12">

                                    <div class="box-header">
                                        @if ($puede_eliminar)
                                            <a href="{{ route('admin.evaluaciones_anestesicas.delete_file', ['id' => $evaluacion->id, 'file_name' => $archivo_lab['nombre']]) }}"
                                                class="btn btn-xs btn-danger pull-right" title="Eliminar" role="button">
                                                <i class="fa fa-trash"></i></a>
                                        @endif
                                    </div>
                                    <div class="box-body">
                                        @if (
                                            $archivo_lab['extension'] !== 'jpg' &&
                                                $archivo_lab['extension'] !== 'jpeg' &&
                                                $archivo_lab['extension'] !== 'gif' &&
                                                $archivo_lab['extension'] !== 'png' &&
                                                $archivo_lab['extension'] !== 'tiff' &&
                                                $archivo_lab['extension'] !== 'tif' &&
                                                $archivo_lab['extension'] !== 'raw' &&
                                                $archivo_lab['extension'] !== 'bmp' &&
                                                $archivo_lab['extension'] !== 'psd')
                                            @if (
                                                $archivo_lab['extension'] !== 'xls' &&
                                                    $archivo_lab['extension'] !== 'doc' &&
                                                    $archivo_lab['extension'] !== 'xlsx' &&
                                                    $archivo_lab['extension'] !== 'docx')
                                                <embed name="plugin"
                                                    src="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_lab['nombre']) }}"
                                                    type="application/pdf" style="width: 100%;">
                                            @else
                                                <img src="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_lab['nombre']) }}"
                                                    style="width: auto ; height: auto " class="center-block">
                                            @endif
                                        @else
                                            <img src="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_lab['nombre']) }}"
                                                style="width: auto ; height: auto " class="center-block">
                                        @endif
                                    </div>

                                    <a type="button"
                                        href="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_lab['nombre']) }}"
                                        target="_blank" class="btn-danger" title="{{ $archivo_lab['nombre'] }}">
                                        <p><span>{{ $archivo_lab['nombre'] }}</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endforeach




                        <hr style="background-color:blue ; height: 2px">
                        <h2 style="text-align:center;" class=" box-title">EX. C. Vascular</h2>
                        </hr>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="ecg">E.C.G.</label>
                                {{ Form::text('ecg', null, ['id' => 'ecg', 'class' => 'form-control', 'placeholder' => 'E.C.G.']) }}
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="r_quirugico_goldman">R. Quirugico (Goldman)</label>
                                {{ Form::text('r_quirugico_goldman', null, ['id' => 'r_quirugico_goldman', 'class' => 'form-control', 'placeholder' => 'R. Quirugico (Goldman)']) }}
                            </div>

                        </div>



                        <div class="row">
                            <div class="info-box bg-green col-lg-12 col-md-12 col-xs-12">
                                <label for="Archivo_Adjunto_ECG">Adjuntar E.C.G </label>
                                <input type="file" class="form-control"
                                    title="Arrastre el Archivo o Haga click para seleccionar" id="Archivo_Adjunto_ECG[]"
                                    name="Archivo_Adjunto_ECG[]" multiple="">

                            </div>
                        </div>

                        @foreach ($archivos_ecg as $archivo_ec)
                            <div class="info-box bg-green col-lg-4 col-md-6 col-xs-12">

                                <div class="box-header">
                                    @if ($puede_eliminar)
                                        <a href="{{ route('admin.evaluaciones_anestesicas.delete_file', ['id' => $evaluacion->id, 'file_name' => $archivo_ec['nombre']]) }}"
                                            class="btn btn-xs btn-danger pull-right" title="Eliminar" role="button">
                                            <i class="fa fa-trash"></i></a>
                                    @endif
                                </div>
                                <div class="box-body">
                                    @if (
                                        $archivo_ec['extension'] !== 'jpg' &&
                                            $archivo_ec['extension'] !== 'jpeg' &&
                                            $archivo_ec['extension'] !== 'gif' &&
                                            $archivo_ec['extension'] !== 'png' &&
                                            $archivo_ec['extension'] !== 'tiff' &&
                                            $archivo_ec['extension'] !== 'tif' &&
                                            $archivo_ec['extension'] !== 'raw' &&
                                            $archivo_ec['extension'] !== 'bmp' &&
                                            $archivo_ec['extension'] !== 'psd')
                                        @if (
                                            $archivo_ec['extension'] !== 'xls' &&
                                                $archivo_ec['extension'] !== 'doc' &&
                                                $archivo_ec['extension'] !== 'xlsx' &&
                                                $archivo_ec['extension'] !== 'docx')
                                            <embed name="plugin"
                                                src="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_ec['nombre']) }}"
                                                type="application/pdf" style="width: 100%; ">
                                        @else
                                            <img src="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_ec['nombre']) }}"
                                                style="width: auto ; height: auto " class="center-block">
                                        @endif
                                    @else
                                        <img src="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_ec['nombre']) }}"
                                            style="width: auto ; height: auto " class="center-block">
                                    @endif
                                </div>

                                <a type="button"
                                    href="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_ec['nombre']) }}"
                                    target="_blank" class="btn-danger" title="{{ $archivo_ec['nombre'] }}">
                                    <p><span>{{ $archivo_ec['nombre'] }}</span>
                                    </p>
                                </a>
                            </div>
                        @endforeach

                        <div class="row">
                            <div class="col-lg-6 col-md-6 form-group">
                                <label for="otros">Otros</label>
                                {{ Form::text('otros', null, ['id' => 'otros', 'class' => 'form-control', 'placeholder' => 'Otros']) }}
                            </div>
                        </div>


                        <div class="row">
                            <div class="info-box bg-orange col-lg-12 col-md-12 col-xs-12">
                                <label for="Archivo_Adjunto_Otro">Adjuntar Otros Estudios</label>
                                <input type="file" class="form-control"
                                    title="Arrastre el Archivo o Haga click para seleccionar" id="Archivo_Adjunto_Otro[]"
                                    name="Archivo_Adjunto_Otro[]" multiple="">

                            </div>
                        </div>
                        @foreach ($archivos_otros as $archivo_otro)
                            <div class="info-box bg-orange col-lg-4 col-md-6 col-xs-12">

                                <div class="box-header">
                                    @if ($puede_eliminar)
                                        <a href="{{ route('admin.evaluaciones_anestesicas.delete_file', ['id' => $evaluacion->id, 'file_name' => $archivo_otro['nombre']]) }}"
                                            class="btn btn-xs btn-danger pull-right" title="Eliminar" role="button">
                                            <i class="fa fa-trash"></i></a>
                                    @endif
                                </div>
                                <div class="box-body">
                                    @if (
                                        $archivo_otro['extension'] !== 'jpg' &&
                                            $archivo_otro['extension'] !== 'jpeg' &&
                                            $archivo_otro['extension'] !== 'gif' &&
                                            $archivo_otro['extension'] !== 'png' &&
                                            $archivo_otro['extension'] !== 'tiff' &&
                                            $archivo_otro['extension'] !== 'tif' &&
                                            $archivo_otro['extension'] !== 'raw' &&
                                            $archivo_otro['extension'] !== 'bmp' &&
                                            $archivo_otro['extension'] !== 'psd')
                                        @if (
                                            $archivo_otro['extension'] !== 'xls' &&
                                                $archivo_otro['extension'] !== 'doc' &&
                                                $archivo_otro['extension'] !== 'xlsx' &&
                                                $archivo_otro['extension'] !== 'docx')
                                            <embed name="plugin"
                                                src="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_otro['nombre']) }}"
                                                type="application/pdf" style="width: 100%; ">
                                        @else
                                            <img src="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_otro['nombre']) }}"
                                                style="width: auto ; height: auto " class="center-block">
                                        @endif
                                    @else
                                        <img src="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_otro['nombre']) }}"
                                            style="width: auto ; height: auto " class="center-block">
                                    @endif
                                </div>

                                <a type="button"
                                    href="{{ url('storage/evaluaciones_anestesicas/' . $evaluacion->id . '/archivos/' . $archivo_otro['nombre']) }}"
                                    target="_blank" class="btn-danger" title="{{ $archivo_otro['nombre'] }}">
                                    <p><span>{{ $archivo_otro['nombre'] }}</span>
                                    </p>
                                </a>
                            </div>
                        @endforeach




                        <div class="row">
                            <div class="col-sm-12  form-group has-feedback">
                                <label for="plan_anestesico">Plan Anestesico </label>
                                <textarea class="form-control" name="plan_anestesico" id="plan_anestesico" rows="3"
                                    placeholder="Ingrese el Plan Anestesico">{{ isset($evaluacion) ? $evaluacion->plan_anestesico : '' }}</textarea>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-sm-12  form-group has-feedback">
                                <label for="interconsulta">Interconsulta </label>
                                <textarea class="form-control" name="interconsulta" id="interconsulta" rows="3" placeholder="Interconsulta">{{ isset($evaluacion) ? $evaluacion->interconsulta : '' }}</textarea>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>


                        <div class="box-footer col-md-6 form-group pull-right ">
                            <a type="button" class="btn btn-outline-danger"
                                href="{{ route('admin.evaluaciones_anestesicas.index') }}">{{ trans('message.close') }}</a>
                            <button type="submit" class="btn btn-outline-primary">{{ trans('message.save') }}</button>
                        </div>
                    </div>
                    </div>

                    {{ Form::close() }}
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box -->
        </div>


    </div>
@stop

@section('css')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }


        .slider2 {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: red;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .sliderlabel {
            top: 4px;
        }

        .slider2:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider2 {
            background-color: green;
        }

        input:focus+.slider2 {
            box-shadow: 0 0 1px orangered;
        }

        input:checked+.slider2:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider2.round {
            border-radius: 34px;
        }

        .slider2.round:before {
            border-radius: 50%;
        }
    </style>
@stop


@section('js')

    <script src="{{ asset('admin1/evaluaciones_anestesicas/edit.js') }}"></script>

@stop
