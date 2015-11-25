var app =angular.module('myApp',[]);

app.controller('GetUsers', function GetUsers($scope, $http) {
    
    $scope.sortType     = 'nombre';     // set the default sort type
    $scope.sortReverse  = false;        // set the default sort order
    $scope.searchUser   = '';           // set the default search/filter term
    $scope.id           = '';
    $scope.correo       = '';
    $scope.nombre       = '';           
    $scope.apellido_I   = '';
    $scope.apellido_II  = '';
    $scope.rol          = '';
    $scope.universidad  = '';
    
    
    // this is where the JSON is consumed
    $http.get("../php/administrador/users.php").
        success(function(data) {
            // here the data from the api is assigned to a variable named users
            $scope.users = data;
        });
        
    $scope.editUsr = function(id){
        $scope.nombre       = $scope.users[id-1].nombre;
        $scope.apellido_I   = $scope.users[id-1].apellido_I;
        $scope.apellido_II  = $scope.users[id-1].apellido_II;
        $scope.correo       = $scope.users[id-1].correo;
        $scope.rol          = $scope.users[id-1].rol;
        $scope.universidad  = $scope.users[id-1].nombre_u;
    }
});