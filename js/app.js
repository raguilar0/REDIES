
var app = angular.module('formApp', [])

app.controller('MainCtrl', function ($scope) {
  $scope.formData = {};
  /*
  $scope.validacionND = function(tipo, input, nd){
    if (tipo == "radio")
    document.getElementById(input).value = "N/D";
    else {
      document.getElementById(nd).checked = false;
      document.getElementById(input).value = "";
  };

*/

  $scope.submitForm = function (formData) {
    alert('Form submitted with' + JSON.stringify(formData));
  };


});
/*
<script type="text/javascript">
function funcionEvento(tipo, input, nd, na) {
  if (tipo == "radio"){
    if(nd.checked
      document.getElementById(input).value = "N/D";

      if(na.checked
        document.getElementById(input).value = "N/A";
      }
      else {
        document.getElementById(nd).checked = false;
        document.getElementById(na).checked = false;
      }
    }
    </script>

    <script type="text/javascript">
    function funcionEvento(tipo, input, nd) {
      if (tipo == "radio")
      document.getElementById(input).value = "N/D";
      else {
        document.getElementById(nd).checked = false;
        document.getElementById(input).value = "";
      }
    }
    </script>
*/
