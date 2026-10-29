@extends('adminlte::page')

@section('title', 'Nuevo Turno')


@section('content_header')
    <h1>Turnos</h1>

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
                        @if (isset($turno->id))
                            <div class="row col-md-12">
                                <div class="form-group  col-md-6">
                                    <label for="id">{{ trans('message.code') }}</label>
                                    {{ Form::text('id', $turno->id, ['id' => 'id', 'class' => 'form-control', 'placeholder' => 'id', 'readonly']) }}
                                </div>

                                @if ($turno->hasEvaluacion())
                                    <div class="form-group col-md-6">
                                        <label for="id">Asociar Evaluación</label>
                                        <form method="get"
                                            action="{{ route('admin.evaluaciones_anestesicas.asociar', $turno->id) }}">
                                            <button type="submit" class="btn btn-outline-primary"
                                                title="Asociar Evaluacion" {{ $turno->hasEvaluacion() ? '' : 'disabled' }}>
                                                <i class="fa fa-file"></i>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="form-group col-md-3" style="text-align: right">
                                        <label for="id">Descargar</label>
                                        <form method="get" 
                                            action="{{ route('admin.evaluaciones_anestesicas.export_evaluacion_pdf', ['id' => $turno->getEvaluacion(), 'mode' => 'pdf']) }}">
                                            <button type="submit" class="btn btn-outline-danger "
                                                title="Descargar Evaluacion">
                                                <i class="fa fa-download"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id">Editar Evaluación</label>
                                        <form method="get"
                                            action="{{ route('admin.evaluaciones_anestesicas.edit', $turno->getEvaluacion()) }}">
                                            <button type="submit" class="btn btn-outline-success"
                                                title="Editar Evaluacion Anestesica">
                                                <i class="fa fa-file"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if (isset($turno->id))
                            {{ Form::model($turno, ['route' => ['admin.turnos.update', $turno->id], 'method' => 'PUT', 'role' => 'form', 'data-toggle' => 'validator']) }}
                        @else
                            {{ Form::open(['route' => 'admin.turnos.store', 'method' => 'POST', 'role' => 'form', 'data-toggle' => 'validator']) }}
                        @endif
                        {{ Form::hidden('url', URL::previous()) }}


                        <div class="row  col-md-12">
                            <div class="col-md-6 form-group has-feedback">
                                <label for="id_institucion">Institución</label>
                                {{ Form::select('id_institucion', $instituciones, null, ['id' => 'id_institucion', 'class' => 'form-control select2']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 form-group paciente-select has-feedback">
                                <a class="btn btn-xs btn-primary btn-add-paciente" title="Agregar Paciente" role="button">
                                    <i class="fa fa-plus"></i></a>

                                <label for="id_paciente">Paciente</label> @if (isset($turno->id_paciente)) <a href="https://api.whatsapp.com/send?phone=549{{ $turno->Paciente->telefono }}"
                                            title="Enviar Mensaje">
                                            <img src="{{ asset('img/whatsapp.png') }}"
                                                style=" width:20px;	height:20px;  " />
                                        </a> @endif
                                @if (isset($turno->id_paciente))
                                    {{ Form::select('id_paciente', $pacientes, $turno->id_paciente, ['id' => 'id_paciente', 'class' => 'form-control select2']) }}
                                @else
                                    {{ Form::select('id_paciente', $pacientes, null, ['id' => 'id_paciente', 'class' => 'form-control select2']) }}
                                @endif
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                        </div>
                        <div class="paciente_section">
                            <hr style="background-color:blue ; height: 1px">
                            </hr>


                            <div class="row col-md-12">
                                <h5 class=" box-title">
                                    <a class="btn btn-xs btn-warning btn-delete-paciente" title="Seleccionar paciente"
                                        role="button">
                                        <i class="fa fa-minus"></i></a> Nuevo Paciente
                                </h5>
                                <div class="col-md-6 form-group">
                                    <label for="nombre_paciente">Nombre</label>
                                    {{ Form::text('nombre_paciente', null, ['id' => 'nombre_paciente', 'class' => 'form-control', 'placeholder' => 'Nombre del paciente']) }}
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label for="telefono_paciente">Telefono</label>
                                    {{ Form::text('telefono_paciente', null, ['id' => 'telefono_paciente', 'class' => 'form-control', 'placeholder' => 'Telefono del paciente']) }}
                                </div>

                            </div>
                            <hr style="background-color:blue ; height: 1px">
                        </div>

                        <div class="row  col-md-12">

                            @if (!isset(Auth::user()->Profesional))
                                <div class="col-md-6 form-group has-feedback">
                                    <label for="id_profesional">Anestesiólogo</label>
                                    {{ Form::select('id_profesional', $profesionales, null, ['id' => 'id_profesional', 'class' => 'form-control select2']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            @endif

                             <div class="col-md-6 form-group has-feedback">
                                <label for="id_obra_social">Obra Social</label>
                                {{ Form::select('id_obra_social', $obras_sociales, null, ['id' => 'id_obra_social', 'class' => 'form-control select2']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            
                        </div>
                        <div class="row  col-md-12">

                            <div class="col-md-6 form-group profesional-select has-feedback">
                                <a class="btn btn-xs btn-primary btn-add-profesional" title="Cirujano" role="button"> <i
                                        class="fa fa-plus"></i></a>

                                <label for="id_profesional_afin">Cirujano</label>
                                @if (isset($turno->id_profesional_afin))
                                    {{ Form::select('id_profesional_afin', $profesionales_afines, $turno->id_profesional_afin, ['id' => 'id_profesional_afin', 'class' => 'form-control select2']) }}
                                @else
                                    {{ Form::select('id_profesional_afin', $profesionales_afines, null, ['id' => 'id_profesional_afin', 'class' => 'form-control select2']) }}
                                @endif
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>


                        </div>
                       
                        <div class="profesional_section">
                            <hr style="background-color:blue ; height: 1px">
                            </hr>


                            <div class="row col-md-12">
                                <h5 class=" box-title">
                                    <a class="btn btn-xs btn-warning btn-delete-profesional" title="Seleccionar Cirujano"
                                        role="button">
                                        <i class="fa fa-minus"></i></a> Nuevo Cirujano
                                </h5>
                                <div class="col-md-6 form-group">
                                    <label for="nombre_profesional">Nombre</label>
                                    {{ Form::text('nombre_profesional', null, ['id' => 'nombre_profesional', 'class' => 'form-control', 'placeholder' => 'Nombre del cirujano']) }}
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label for="matricula_profesional">Matricula</label>
                                    {{ Form::text('matricula_profesional', null, ['id' => 'matricula_profesional', 'class' => 'form-control', 'placeholder' => 'Matricula del cirujano']) }}
                                </div>


                            </div>
                            <hr style="background-color:blue ; height: 1px">
                        </div>
                         <div class="col-md-6 form-group has-feedback">
                                <label for="fecha">Fecha</label>
                                <div class="input-group date">

                                    {{ Form::text('fecha', isset($fecha) ? $fecha : null, ['id' => 'fecha', 'class' => 'form-control', 'placeholder' => 'dd-mm-aaaa']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                            </div>
                        <div class="row col-md-12">
                            <div class="col-md-6 form-group has-feedback">
                                <label for="hora_inicio">Horario inicio</label>
                                <div class="row">
                                    <div class="col-md-3 form-group has-feedback">

                                        {{ Form::select('hora_inicio', $horas, isset($hora) ? $hora : null, ['id' => 'hora_inicio', 'class' => 'form-control']) }}
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 form-group has-feedback">

                                        {{ Form::select('minuto_inicio', $minutos, isset($minuto) ? $minuto : null, ['id' => 'minuto_inicio', 'class' => 'form-control']) }}
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group has-feedback">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <label for="hora_fin">Horario Fin</label>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group has-feedback">

                                        {{ Form::select('hora_fin', $horas, isset($hora_hasta) ? $hora_hasta : null, ['id' => 'hora_fin', 'class' => 'form-control']) }}
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 form-group has-feedback">

                                        {{ Form::select('minuto_fin', $minutos, isset($minuto) ? $minuto : null, ['id' => 'minuto_fin', 'class' => 'form-control']) }}
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="row  col-md-12">
                                <div class="col-md-6 form-group has-feedback">
                                    <label for="id_tipos_turno">Tipo de Turnos </label>
                                    {{ Form::select('id_tipos_turno', $tipos_turno, null, ['id' => 'id_tipos_turno', 'class' => 'form-control select2']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                @if (isset($turno->id))
                                    <div class="col-md-6 form-group has-feedback">
                                        <label for="id_estado_turnos">Estado</label>
                                        {{ Form::select('id_estado_turnos', $estado_turnos, null, ['id' => 'id_estado_turnos', 'class' => 'form-control select2']) }}
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                @endif

                            </div>

                            <div class="row  col-md-12">
                                <div class="col-md-6 form-group has-feedback">
                                    <label for="id_practica">Práctica</label>
                                    {{ Form::select('id_practica', $practicas, null, ['id' => 'id_practica', 'class' => 'form-control select2']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 form-group has-feedback">
                                    <label for="preanestesico">Pre Anestésico</label>
                                    {{ Form::select('preanestesico', ['No' => 'No', 'Si' => 'Si'], null, ['id' => 'preanestesico', 'class' => 'form-control']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12  form-group has-feedback">
                                    <label for="observacion">Observaciones </label>
                                    <textarea class="form-control" name="observacion" id="observacion" rows="3">{{ isset($turno) ? $turno->observacion : '' }}</textarea>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                            </div>
                        </div>



                        <div class="box-footer">
                            <div class="row  col-md-12">
                                <div class="col-md-6 form-group pull-right">
                                    <a type="button" class="btn btn-outline-danger"
                                        href="{{ url()->previous() }}">{{ trans('message.close') }}</a>

                                    <button type="submit"
                                        class="btn btn-outline-primary">{{ trans('message.save') }}</button>
                                </div>
                                {{ Form::close() }}
                                <div class="col-md-6 form-group">
                                    @if (isset($turno->id))
                                        <form method="post" action="{{ route('admin.turnos.destroy', $turno->id) }}">
                                            @method('delete') @csrf
                                            <button type="submit" class="btn btn-outline-danger" title="Eliminar Turno">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>


        </div>
    </div>
@stop

@section('css')
@stop


@section('js')

    <script src="{{ asset('admin1/turnos/edit.js') }}"></script>
    <script src="{{ asset('admin1/turnos/edit_paciente.js') }}"></script>

@stop
