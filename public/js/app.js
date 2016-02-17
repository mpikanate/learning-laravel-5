var mainApp = angular.module("mainApp", ['ngRoute']);
 
mainApp.config(function($routeProvider) {
    $routeProvider
        .when('/home', {
            templateUrl: 'testNgRoute/home.html'
        })
        .when('/viewStudents', {
            templateUrl: 'testNgRoute/viewStudents.html'
        })
        .otherwise({
            redirectTo: '/home'
        });
});
 
mainApp.controller('StudentController', function($scope) {
    $scope.students = [
        {name: 'Mark Waugh', city:'New York'},
        {name: 'Steve Jonathan', city:'London'},
        {name: 'John Marcus', city:'Paris'}
    ];
 
    $scope.message = "Click on the hyper link to view the students list.";
});



mainApp.controller('todoController', function($scope, $location , $http ) {

	

	$scope.loading = false;
	$scope.titleTab = true;

	//loading before usertask
	$scope.loading2 = false;

	

	$scope.front = function(index){
		$scope.titleTab = false;
		$scope.loading2 = true;
		

		var list = $scope.usertasks[index];
		$scope.tmpTasks = $scope.tasks[index];


		$http.get('todoapp/'+ list.id).success(function(data, status, headers, config) {
			$scope.listsuser = data;
			$scope.userTaskTab = true;
			$scope.loading2 = false;
			$location.path( "/viewStudents" );
		});

	}



	$scope.back = function(){
		$scope.titleTab = true;
		
	}

	$scope.getUserDetail = function(id){
		
		$http.get('api/usertasks/'+id).success(function(data, status, headers, config) {
			$scope.tmpUsertask = data;

		});
		
	}

	

	



	$scope.getUsertasks = function(index) {
		$scope.loading = true;
		$http.get('todoapp/'+index).success(function(data, status, headers, config) {
			$scope.usertasks = data;
			$scope.loading = false;

		});
	}

	$scope.init = function() {
		$scope.loading = true;
		$http.get('api/usertasks').success(function(data, status, headers, config) {
			$scope.usertasks = data;
			$scope.loading = false;

		});
		
		$http.get('api/tasks').success(function(data, status, headers, config) {
			$scope.tasks = data;
			$scope.loading = false;

		});
	}


	

	$scope.init();

});