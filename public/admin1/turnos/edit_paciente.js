$(document).ready(function () {
  if (!turnos) {
    var turnos = {};
}


turnos = { 
    addPaciente: function () {
      $(".paciente-select").hide();
      $(".paciente_section").show();
    },
    deletePaciente: function () {
      $("#nombre_paciente").val('');
      $(".paciente_section").hide();
      $(".paciente-select").show();
    },

      addProfesional: function () {
      $(".profesional-select").hide();
      $(".profesional_section").show();
    },
    deleteProfesional: function () {
      $("#nombre_profesional").val('');
      $(".profesional_section").hide();
      $(".profesional-select").show();
    },

 

    init: function () {
        $(".btn-add-paciente").on("click", this.addPaciente);
        $(".btn-delete-paciente").on("click", this.deletePaciente);
        $(".paciente_section").hide();
          $(".btn-add-profesional").on("click", this.addProfesional);
        $(".btn-delete-profesional").on("click", this.deleteProfesional);
        $(".profesional_section").hide();
    },
};

$(function () {
    "use strict";
    turnos.init();
});
  //your code here
});