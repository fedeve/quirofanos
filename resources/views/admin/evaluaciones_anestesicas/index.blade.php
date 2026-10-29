@extends('adminlte::page')

@section('title', 'Lista de Evaluaciones Anestesicas')

@section('content_header')
    <h1>Evaluaciones Anestesicas</h1>
@stop

@section('content')
<div class="card">
 
    
<div class="cadr-body">
    <div class="form-group col-sm-12">
        <div class="row">
            <br>
        </div>
    <table id="evaluaciones_anestesicas" class="table table-striped col-sm-12">
        <thead class="bg-secondary text-white">
            <tr>
                <th> Número  </th>
                            <th>Fecha</th>
                            <th>Paciente</th>
                            <th>DNI</th>
                            <th>Obra Social</th>
                            <th>Institucion</th>
                            <th>Anestesiólogo</th>                             
                            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

 @foreach($evaluaciones as $evaluacion)
                        <tr>
                            <td>{{$evaluacion->id}}</td>
                            <td>{{$evaluacion->fecha_consulta}}</td>
                            <td>{{$evaluacion->nombre_paciente}}</td>
                            <td>{{$evaluacion->dni_paciente}}</td>
                            <td>{{isset($evaluacion->Obra_social) ? $evaluacion->Obra_social->denominacion_amigable : ''}}</td>
                            <td>{{isset($evaluacion->Institucion) ? $evaluacion->Institucion->nombre : ''}}</td>
                            <td>{{isset($evaluacion->Profesional) ? $evaluacion->Profesional->nombre : ''}}</td>
                            
                            <td>
                              <div class="row">

                                <div class="col-md-3 form-group">
                                        <a  href="{{ route('admin.evaluaciones_anestesicas.archivos', ['id'=>$evaluacion->id]) }}"
                                  
                                  class="btn btn-success" title="Archivos" role="button" target="_blank">
                                 <i class=" glyphicon glyphicon-folder-open"><?php echo \App\Models\EvaluacionAnestesica::countFiles($evaluacion->id); ?> </i> 
                             </a>
                                
                             
                     </div>
                        <div class="col-md-3 form-group">
                        <form method="post" action="{{ route('admin.evaluaciones_anestesicas.destroy', $evaluacion->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger"
                                                    title="Eliminar Evaluacion Anestesica">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                        </div>
                        <div class="col-md-3 form-group">
                             <form method="get" action="{{route('admin.evaluaciones_anestesicas.edit',$evaluacion->id)}}">
                             <button type="submit" class="btn btn-outline-primary" title="Editar Evaluacion Anestesica">
                                    <i class="fa fa-edit"></i>
                             </button>
                            </form>
                        </div>
                        <div class="col-md-3 form-group">
                             <form method="get" action="{{route('admin.evaluaciones_anestesicas.export_evaluacion_pdf',['id'=>$evaluacion->id, 'mode'=>'pdf'])}}">
                             <button type="submit" class="btn btn-outline-danger" title="Exportar Evaluacion Anestesica">
                                    <i class="fa fa-file-pdf"></i>
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
@include('admin.evaluaciones_anestesicas.partials.ver')
</div>
@stop

@section('css')
   @stop

@section('js')
 
<script src="{{ asset('admin1/evaluaciones_anestesicas/index.js') }}"></script>
   

@stop