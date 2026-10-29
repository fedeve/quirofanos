@extends('adminlte::page')

@section('title', 'Lista de Vacaciones')

@section('content_header')
    <h1>Vacaciones</h1>
@stop

@section('content')
    <div class="card">
        <a href="{{ route('admin.vacaciones.create') }}" title="Crear Nuevas Vacaciones"
            style="position:fixed;	width:60px;	height:60px; top:57px;	right:40px;
            background-color:#FFF;	color:#25d366;	border-radius:50px;	text-align:center;
            font-size:30px;	box-shadow: 2px 2px 3px #999; z-index:100;"
             onMouseOver="this.style.color='#FFF'; this.style.background = '#25d366'"
            onMouseOut="this.style.color='#25d366'; this.style.background = '#fff'">
            <i class="fa fa-plus" style="margin-top:16px"></i>
        </a>
        <div class="cadr-body">
            <div class="form-group col-sm-12">
                <div class="row">
                    <br>
                </div>
                <table id="vacaciones" class="table table-striped col-sm-12">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Id</th>
                            <th>Anestesiólogo</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Fin</th>                              
                            <th>Descripcion</th>   
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacaciones as $vacacion)
                            <tr>
                                <td>{{ $vacacion->id }}</td>
                                <td>{{ $vacacion->Profesional->nombre ?? 'Todos' }}</td>
                                <td>{{ $vacacion->fecha_inicio }}</td>
                                <td>{{ $vacacion->fecha_fin }}</td>
                                <td>{{ $vacacion->descripcion }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2 form-group">
                                        <form method="post" action="{{ route('admin.vacaciones.destroy', $vacacion->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger"
                                                    title="Eliminar Vacaciones">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                        <div class="col-md-2 form-group">
                                            <form method="get"
                                                action="{{ route('admin.vacaciones.edit', $vacacion->id) }}">
                                                <button type="submit" class="btn btn-outline-primary"
                                                    title="Editar Vacaciones">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        @include('admin.vacaciones.partials.eliminar')
    </div>

@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('admin1/vacaciones/index.js') }}"></script>

@stop
