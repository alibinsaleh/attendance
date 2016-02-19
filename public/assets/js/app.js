var myApp = angular.module('myApp', []);

myApp.config(function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});


myApp.controller('StudentsListController', ['$scope', '$http', function($scope, $http){

	$scope.students = [];
	$scope.loading = false;
 	
	$scope.init = function() {
		$scope.loading = true;
		$http.get('/studentsdata').
		success(function(data, status, headers, config) {
			$scope.students = data;
				$scope.loading = false;
 			console.log($scope.students);
		});
	}

	$scope.updateName = function(name) {
		$scope.loading = true;
 
		$http.put('/api/todos/' + todo.id, {
			title: todo.title,
			done: todo.done
		}).success(function(data, status, headers, config) {
			todo = data;
				$scope.loading = false;
 
		});;
	};
 

	$scope.init();

}]);