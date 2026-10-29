$(document).ready(function() {
 
    $('.select2').select2();
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };

    $.datepicker.setDefaults($.datepicker.regional['es']);
    $("#fecha_consulta").datepicker({
        todayBtn: "linked",
        language: 'es',
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'dd-mm-yy'
    });
    
    $("#transfusiones_fecha").datepicker({
        todayBtn: "linked",
        language: 'es',
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'dd-mm-yy'
    });

      $("#dialisis_frec_ultima").datepicker({
        todayBtn: "linked",
        language: 'es',
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'dd-mm-yy'
    });

     $("#fum").datepicker({
        todayBtn: "linked",
        language: 'es',
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'dd-mm-yy'
    });

 $("#tabaco_desde").datepicker({
        todayBtn: "linked",
        language: 'es',
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'dd-mm-yy'
    });
    
    if (!evaluacion) {
        var evaluacion = {};
    }


    evaluacion = { 
      /*  addPaciente: function () {
          $(".paciente-select").hide();
          $(".paciente_section").show();
        },
        deletePaciente: function () {
          $("#nombre_paciente").val('');
          $(".paciente_section").hide();
          $(".paciente-select").show();
        },*/

          addInstitucion: function () {
          $(".institucion_select").hide();
          $(".institucion_section").show();
        },
        deleteInstitucion: function () {
          $("#denominacion_establecimeinto").val('');
          $(".institucion_section").hide();
          $(".institucion_select").show(); 
        },

        init: function () {
       /* $(".btn-add-paciente").on("click", this.addPaciente);
        $(".btn-delete-paciente").on("click", this.deletePaciente);
        $(".paciente_section").hide();*/
        $(".btn-add-institucion").on("click", this.addInstitucion);
        $(".btn-delete-institucion").on("click", this.deleteInstitucion);
        $(".institucion_section").hide();
        }
    };

    $(function () { 
        "use strict";
        evaluacion.init();
    });
});