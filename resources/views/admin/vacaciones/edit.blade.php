@extends('adminlte::page')

@section('title', 'Nuevas Vacaciones')


@section('content_header')
<h1>Nuevas Vacaciones</h1>
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

                    @if(isset($vacacion))
                    {{ Form::model($vacacion,['route'=>['admin.vacaciones.update', $vacacion->id],'method' => 'PUT', 'role'=>'form', 'data-toggle'=>'validator']) }}
                    @else
                    {{ Form::open(['route' => 'admin.vacaciones.store','method'=>'POST', 'role'=>'form', 'data-toggle'=>'validator']) }}
                    @endif

                    @if(isset($vacacion->id))
                    <div class="row  col-md-12">
                    <div class="form-group col-md-6">
                        <label for="id">{{ trans('message.code') }}</label>
                        {{ Form::text('id', null, array('id' => 'id','class' => 'form-control','placeholder'=>"id", 'readonly')) }}
                    </div>
                    </div>
                    @endif
<div class="row  col-md-12">
                     <div class="col-md-6 form-group has-feedback">
                                <label for="fecha_inicio">Fecha de Inicio</label>
                                <div class="input-group date">

                                    {{ Form::text('fecha_inicio', isset($vacacion->fecha_inicio) ? $vacacion->fecha_inicio : null, ['id' => 'fecha_inicio', 'class' => 'form-control', 'placeholder' => 'dd-mm-aaaa']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                            </div>

                             <div class="col-md-6 form-group has-feedback">
                                <label for="fecha_fin">Fecha de Fin</label>
                                <div class="input-group date">

                                    {{ Form::text('fecha_fin', isset($vacacion->fecha_fin) ? $vacacion->fecha_fin : null, ['id' => 'fecha_fin', 'class' => 'form-control', 'placeholder' => 'dd-mm-aaaa']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                            </div>
                              </div>
                    <div class="row  col-md-12">
                         <div class="col-md-6 form-group has-feedback">
                                    <label for="id_profesional">Anestesiólogo</label>
                                    {{ Form::select('id_profesional', $profesionales, null, ['id' => 'id_profesional', 'class' => 'form-control select2']) }}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        <div class="col-md-6 form-group has-feedback">
                            <label for="descripcion">Descripcion</label>
                            {{ Form::text('descripcion', null, array('id' => 'descripcion','class' => 'form-control','placeholder' => trans('message.description'))) }}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>     
                        
                    </div>
                    

                    <div class="box-footer col-md-6 form-group pull-right ">
                        <a type="button" class="btn btn-outline-danger" href="{{route('admin.vacaciones.index')}}">{{ trans('message.close') }}</a>
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
  <script src="{{ asset('admin1/vacaciones/edit.js') }}"></script>


@stop