 
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import resourceTimelinePlugin from '@fullcalendar/resource-timeline';
import resourceTimeGridPlugin from '@fullcalendar/resource-timegrid';

const calendarEl = document.getElementById('calendar');
const calendar = new Calendar(calendarEl, {
  plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin, resourceTimelinePlugin, resourceTimeGridPlugin],
   initialView: 'resourceTimeGridDay',
    schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
   locale: 'es',
                  height: 'auto', 
                 
                 selectLongPressDelay: 100,
                 eventClassNames: ['my-event'],
                 allDaySlot: false,
                 allDayText: 'Todo el día', 
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
    right: 'dayGridMonth,resourceTimeGridDay,resourceTimeGridWeek,listWeek,resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth',
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
  selectable: true,
  select: function(selectionInfo) {
    const url = new URL(calendarEl.dataset.selectUrl, window.location.href);
    url.searchParams.set('start', selectionInfo.startStr);
    url.searchParams.set('end', selectionInfo.endStr);
    window.location.assign(url);
  },
   eventClick: function(clickInfo) {
     const url = new URL(calendarEl.dataset.selectUrl, window.location.href);
     url.searchParams.set('id', clickInfo.event.id);
     window.location.assign(url);
   },
  editable: true,
    resources: calendarEl.dataset.resourcesUrl, 
   events: calendarEl.dataset.eventsUrl
});

calendar.render();