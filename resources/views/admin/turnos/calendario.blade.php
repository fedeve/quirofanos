 @extends('adminlte::page')

 @section('title', 'Calendario de Turnos')


 @section('content_header')
     <h1>Calendario</h1>

 @stop

 @section('content')

     <div class="card">
         <div class="card-body">
             <div class="row">
                 <div class="form-group col-lg-10 col-md-12 col-sm-12">
                     <div id="calendar"
                         data-select-url="{{ route('admin.turnos.fullcalendarAjax') }}"
                         data-events-url="{{ route('admin.turnos.fullcalendar') }}"
                         data-resources-url="{{ route('admin.turnos.resourcescalendar') }}"></div>
                 </div>
                 <div class="form-group col-lg-2 col-md-12 col-sm-12">
                     <br>
                     <div class="container text-center">

                         <div class="bg-secondary text-white">
                             <div class="p-3" style="text-transform:uppercase; font-weight: bolder">Boxes
                             </div>
                         </div>
                         <div class="list-group" style="padding: 1em">
                             @foreach ($instituciones as $institucion)
                                 <div class="list-group-item"
                                     style="border-radius:50px; border-color:{{ $institucion->color }}; text-align:center; 
                                            text-transform:uppercase; font-weight: bolder; font-size:12px; border-width:6px; padding: 2px;">
                                     {{ $institucion->nombre }}
                                 </div>
                             @endforeach
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 @stop

 @section('css')

     <style>
        
        
 

 
         .fc-toolbar {
             text-transform: capitalize;
         }

         .fc-day-header,
         .fc-col-header-cell-cushion {
             text-transform: capitalize;
         }
    
     
     </style>
 @stop

 @section('js') 
 
      @vite('resources/js/turnos/calendario.js')

 @stop
