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
                     <div id='calendar'></div>
                 </div>
                 <div class="form-group col-lg-2 col-md-12 col-sm-12">
                     <br>
                     <div class="container text-center">

                         <div class="bg-secondary text-white">
                             <div class="p-3" style="text-transform:uppercase; font-weight: bolder">Instituciones
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
        
         .my-event {
             margin-left: 2px;
             /* Adjust the value as needed */
             margin-right: 30px;
             /* Adjust the value as needed */
             margin-top: 2px;
             /* Adjust the value as needed */
             margin-bottom: 2px;
            /* white-space: pre;
             height:100%;
             width: auto;*/
         }
 

 
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

     <script>
         document.addEventListener('DOMContentLoaded', function() {
             var calendarEl = document.getElementById('calendar');
             var calendar = new FullCalendar.Calendar(calendarEl, {
                 locale: 'es',
                  height: 'auto', 
                 
                 selectLongPressDelay: 100,
                 eventClassNames: ['my-event'],
                 initialView: 'dayGridMonth',
                 allDaySlot: false,
                 allDayText: 'Todo el día',
                 allDayDefault: false,
                 navLinks: true, // can click day/week names to navigate views
                 slotMinTime: '07:00:00',
                 slotMaxTime: '21:00:00',
                  buttonText: {
                     today: 'Hoy',
                     month: 'Mensual',
                     week: 'Semanal',
                     day: 'Diario',
                     listMonth: 'Lista Mensual',
                     listYear: 'Años',
                     listWeek: 'Lista Semanal',
                     allDayText: 'Todo el día',
                     listDay: 'Días'
                 },

                 headerToolbar: {
                     left: 'prev,next today',
                     center: 'title',
                     right: 'dayGridMonth,listMonth,timeGridWeek,listWeek,timeGridDay'

                 },
                 dayCellDidMount: function(info) {
                     const today = new Date();
                     // Check if the cell's date matches the current day and month
                     if (info.date.getDate() === today.getDate() &&
                         info.date.getMonth() === today.getMonth() &&
                         info.date.getFullYear() === today.getFullYear()) {
                         info.el.style.backgroundColor = "#FAFAFA"; // Set background color for today
                     }
                 },
                 events: "{{ route('admin.turnos.fullcalendar') }}",
                 selectable: true,
                 select: function(start, end, allDay) {
                     const params = {
                         start: start.startStr,
                         end: start.endStr
                     };
                     const url = new URL("{{ route('admin.turnos.fullcalendarAjax') }}");
                     url.search = new URLSearchParams(params).toString();
                     location.assign(url);
                 },
                 eventClick: function(title) {
                     const params = {
                         id: title.event.id
                     };
                     const url = new URL("{{ route('admin.turnos.fullcalendarAjax') }}");
                     url.search = new URLSearchParams(params).toString();
                     location.assign(url);
                 }
                 /* dateClick: function() {
                       formulario.reset();
                        formulario.start.value = info.dateStr;
                        formulario.end.value = info.dateStr;
                     $('#evento').modal('show');
                 }*/
             });
             calendar.render();

         });
     </script>
     <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>

 @stop
