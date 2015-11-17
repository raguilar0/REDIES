
var app = angular.module('formApp', [])

app.controller('MainCtrl', function ($scope) {
  $scope.formData = {};

  $scope.submitForm = function (formData) {
    alert('Form submitted with' + JSON.stringify(formData));
  };

});

function validacionNDNA(tipo, input, na, nd) {
  if (tipo == "radio"){
    if(nd.checked){
      document.getElementById(input).value = "N/D";
    }

    if(na.checked){
      document.getElementById(input).value = "N/A";
    }
  }
    else {
      document.getElementById(nd).checked = false;
      document.getElementById(na).checked = false;
      //document.getElementById(input).value = ;

    }
}

function validacionND(tipo, input, nd) {
  if (tipo == "radio")
    document.getElementById(input).value = "N/D";
  else {
    document.getElementById(nd).checked = false;
    //document.getElementById(input).value = "";
  }
}

function validacionSINO(tipo, input, si, no, nd){
  if(tipo == "radio"){
    if(document.getElementById(si).checked){
      document.getElementById(input).value = "";
    }
    if(document.getElementById(no).checked){
      document.getElementById(input).value = "No";
    }
    if(document.getElementById(nd).checked){
      document.getElementById(input).value = "N/D";
    }
  }
}

function validacionSINO2(tipo, input1, input2, si, no, nd){
  if(tipo == "radio"){
    if(document.getElementById(si).checked){
      document.getElementById(input1).value = "";
      document.getElementById(input2).value = "";
    }
    if(document.getElementById(no).checked){
      document.getElementById(input1).value = "No";
      document.getElementById(input2).value = "No";
    }
    if(document.getElementById(nd).checked){
      document.getElementById(input1).value = "N/D";
      document.getElementById(input2).value = "N/D";
    }
  }
}

function mostrar(){
  document.getElementById(oculto).style.display = 'inline-block';
}

function ocultar(){
  document.getElementById(oculto).style.display = 'none';
}

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
