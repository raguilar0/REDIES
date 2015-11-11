
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

function validacionSINO(tipo, input, no, nd){
  if(tipo == "radio"){
    if(no.checked){
      document.getElementById(input).value = "No";
    }
    if(nd.checked){
      document.getElementById(input).value = "N/D";
    }
  }
}

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
