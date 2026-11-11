import clsx from "clsx";
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import interactionPlugin from "@fullcalendar/interaction";

$(document).ready(function () {
    //armar los select 2

  document.addEventListener('DOMContentLoaded', function() {
             var calendarEl = document.getElementById('calendar');
             var calendar = new FullCalendar.Calendar(calendarEl, {
  schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',

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
});
