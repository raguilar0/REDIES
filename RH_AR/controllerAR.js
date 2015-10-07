var app = angular.module("MyFirstApp",[]);
app.controller("FirstController",function($scope){
	$scope.nombre = "Ricardo";
	$scope.nuevoComentario ={};
	$scope.comentarios = [
		{
			comentario: "Buen tutorial",
			username: "Codigo Facilito"
		},
		{
			comentario: "Malisimo el tutorial",
			username: "otro_usuario"
		}
	];
	$scope.agregarComentario=function(){
		$scope.comentarios.push($scope.nuevoComentario);
		$scope.nuevoComentario ={};
	}
});
