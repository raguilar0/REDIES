var app =angular.module('myApp',[]);

app.controller('GetUsers', function GetUsers($scope, $http) {

    // this is where the JSON is consumed
    $http.get("http://localhost/REDIES/php/administrador/users.php").
        success(function(data) {
            // here the data from the api is assigned to a variable named users
            $scope.users = data;
        });
});
