@extends('adminlte::page')

@section('title', 'Lista de Turnos')

@section('content_header')
    <h1>Turnos</h1>
@stop

@section('content')
    <div class="card">
        <a href="{{ route('admin.turnos.create') }}" title="Crear Nuevo Turno"
            style="position:fixed;	width:60px;	height:60px; top:57px;	right:40px;
    background-color:#FFF;	color:#25d366;	border-radius:50px;	text-align:center;
    font-size:30px;	box-shadow: 2px 2px 3px #999; z-index:100;"
            onMouseOver="this.style.color='#FFF'; this.style.background = '#25d366'"
            onMouseOut="this.style.color='#25d366'; this.style.background = '#fff'">
            <i class="fa fa-plus" style="margin-top:16px"></i>
        </a>

        @include('admin.turnos.partials.busqueda')

    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group col-sm-12">
                <div class="row">
                    <br>
                </div>
                <table id="turnos" class="table table-striped col-sm-12">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Id</th>
                            <th>Paciente</th>
                            <th>Anestesiólogo</th>
                            <th>Cirujano</th>
                            <th>Pre Anestésico</th>
                            <th>Institución</th>
                            <th>Fecha</th>
                            <th>Horario inicio</th>
                            <th>Horario fin</th>
                            <th>Estado</th>
                            <th><i class="fa fa-trash"></i></th>
                            <th><i class="fa fa-edit"></i></th>
                            <th colspan="1"><i class="fa fa-file"></i></th>
                            <th colspan="1"><i class="fa fa-file"></i></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($turnos as $turno)
                            <tr>
                                <td>{{ $turno->id }}</td>
                                <td>
                                    @if (isset($turno->Paciente))
                                        {{ $turno->Paciente->nombre }}
                                        <a href="https://api.whatsapp.com/send?phone=549{{ $turno->Paciente->telefono }}"
                                            title="Enviar Mensaje">
                                            <img src="{{ asset('img/whatsapp.png') }}"
                                                style=" width:20px;	height:20px;  " />
                                        </a>
                                    @endif

                                </td>
                                <td>{{ isset($turno->Profesional) ? $turno->Profesional->nombre : '' }}</td>
                                <td>{{ isset($turno->ProfesionalAfin) ? $turno->ProfesionalAfin->nombre : '' }}</td>
                                <td>{{ $turno->preanestesico }}</td>
                                <td>{{ isset($turno->Institucion) ? $turno->Institucion->nombre : '' }}</td>
                                <td>{{ $turno->fecha }}</td>
                                <td>{{ $turno->hora_inicio . ':' . $turno->minuto_inicio }}</td>
                                <td>{{ $turno->hora_fin . ':' . $turno->minuto_fin }}</td>

                                <td>{{ isset($turno->EstadoTurno) ? $turno->EstadoTurno->denominacion : '' }}</td>
                                <td>
                                    <form method="post" action="{{ route('admin.turnos.destroy', $turno->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" title="Eliminar Turno">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="get" action="{{ route('admin.turnos.edit', $turno->id) }}">
                                        <button type="submit" class="btn btn-outline-primary" title="Editar Turno">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </form>
                                </td>
                                @if ($turno->hasEvaluacion())
                                    <td colspan="1">
                                        <form method="get"
                                            action="{{ route('admin.evaluaciones_anestesicas.asociar', $turno->id) }}">
                                            <button type="submit" class="btn btn-outline-primary"
                                                title="Asociar Evaluacion" {{ $turno->hasEvaluacion() ? '' : 'disabled' }}>
                                                <i class="fa fa-file"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td colspan="1">

                                    </td>
                                @else
                                    <td colspan="1">
                                        <form method="get"
                                            action="{{ route('admin.evaluaciones_anestesicas.export_evaluacion_pdf', ['id' => $turno->getEvaluacion(), 'mode' => 'pdf']) }}">
                                            <button type="submit" class="btn btn-outline-danger"
                                                title="Descargar Evaluacion">
                                                <i class="fa fa-file"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td colspan="1">

                                        <form method="get"
                                            action="{{ route('admin.evaluaciones_anestesicas.edit', $turno->getEvaluacion()) }}">
                                            <button type="submit" class="btn btn-outline-success"
                                                title="Editar Evaluacion Anestesica">
                                                <i class="fa fa-file"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @stop

    @section('css')
    @stop

    @section('js')

        <script src="{{ asset('admin1/turnos/index.js') }}"></script>

    @stop
