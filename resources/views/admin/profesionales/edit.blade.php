@extends('adminlte::page')

@section('title', 'Nuevo Profesional')


@section('content_header')
    <h1>Nuevo Profesional</h1>
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

                        @if (isset($profesional))
                            {{ Form::model($profesional, ['route' => ['admin.profesionales.update', $profesional->id], 'method' => 'PUT', 'role' => 'form', 'data-toggle' => 'validator', 'files' => true]) }}
                        @else
                            {{ Form::open(['route' => 'admin.profesionales.store', 'method' => 'POST', 'role' => 'form', 'data-toggle' => 'validator', 'files' => true]) }}
                        @endif

                        @if (isset($profesional))
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="id">Id</label>
                                    {{ Form::text('id', null, ['id' => 'id', 'class' => 'form-control', 'placeholder' => 'id', 'readonly']) }}
                                </div>
                            </div>
                        @endif
                        <div class="row col-md-12">

                            <div class="col-md-6 form-group has-feedback">
                                <label for="nombre">Nombre</label>
                                {{ Form::text('nombre', null, ['id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Nombre']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 form-group has-feedback">
                                <label for="cuit">CUIT</label>
                                {{ Form::text('cuit', null, ['id' => 'cuit', 'class' => 'form-control', 'placeholder' => 'CUIT']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-6 form-group has-feedback">
                                <label for="id_especialidad">Especialidad</label>
                                {{ Form::select('id_especialidad', $especialidades, null, ['id' => 'id_especialidad', 'class' => 'form-control select2']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 form-group has-feedback">
                                <label for="matricula">Matrícula</label>
                                {{ Form::text('matricula', null, ['id' => 'matricula', 'class' => 'form-control', 'placeholder' => 'Matricula']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                        </div>



                        <div class="row col-md-12">
                            <div class="col-md-6 form-group has-feedback">
                                <label for="mail">Mail</label>
                                {{ Form::text('mail', null, ['id' => 'mail', 'class' => 'form-control', 'placeholder' => 'Mail']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 form-group has-feedback">
                                <label for="telefono">Teléfono</label>
                                {{ Form::text('telefono', null, ['id' => 'telefono', 'class' => 'form-control', 'placeholder' => 'Telefono']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-2 form-group has-feedback">
                                <label for="hora_inicio">Horario Laboral Inicio</label>
                                {{ Form::select('hora_inicio', $horas, null, ['id' => 'hora_inicio', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-2 form-group has-feedback">
                                <label for="hora_fin">Horario Laboral Fin</label>
                                {{ Form::select('hora_fin', $horas, null, ['id' => 'hora_fin', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-2 form-group has-feedback">
                                <label for="minutos_hab">Minutos Habilitados</label>
                                {{ Form::select('minutos_hab', $minutos, null, ['id' => 'minutos_hab', 'class' => 'form-control']) }}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <hr style="background-color:blue ; height: 2px">
                        </hr>
                        <div class="info-card bg-secondary col-md-12" style="padding: 1em">
                            <label for="Firma">Firma</label>
                            <input type="file" class="form-control"
                                title="Arrastre el Archivo o Haga click para seleccionar" id="Firma" name="Firma">

                        </div>
                          @if (isset($profesional))
                         <div class="info-card bg-secondary col-md-12" style="padding: 1em">
                        <embed name="plugin" type="application/pdf" style="width: 100%; "
                            src="{{ url('storage/profesionales/' . $profesional->id . '/archivos/' . $profesional->firma) }}">
                         </div>
                         @endif
                         <hr style="background-color:blue ; height: 2px">
                        </hr>



                        <div class="box-footer col-md-6 form-group pull-right ">
                            <a type="button" class="btn btn-outline-danger"
                                href="{{ route('admin.profesionales.index') }}">{{ trans('message.close') }}</a>
                            <button type="submit" class="btn btn-outline-primary">{{ trans('message.save') }}</button>
                        </div>
                        {{ Form::close() }}
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


@stop
