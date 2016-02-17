var phonecatControllers = angular.module('phonecatControllers', []);

phonecatControllers.controller('PhoneListCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('phones/phones.json').success(function(data) {
      $scope.phones = data;
    });

    $scope.orderProp = 'age';
  }]);

phonecatControllers.controller('PhoneDetailCtrl', ['$scope', '$routeParams',
  function($scope, $routeParams) {
    $scope.phoneId = $routeParams.phoneId;
  }]);


app.controller('todoController', function($scope, $http) {

	$scope.usertasks = [];
	$scope.users = [];
	$scope.tasks = [];

	$scope.tmpTasks = [];
	$scope.tmpUsertask = [];

	$scope.loading = false;
	$scope.titleTab = true;
	$scope.userTaskTab = false;

	//loading before usertask
	$scope.loading2 = false;

	//sugn button
	$scope.loading2 = false;
	

	$scope.front = function(index){
		$scope.titleTab = false;
		$scope.loading2 = true;
		$scope.userTaskTab = false;

		var list = $scope.usertasks[index];
		$scope.tmpTasks = $scope.tasks[index];


		$http.get('todoapp/'+ list.id).success(function(data, status, headers, config) {
			$scope.listsuser = data;
			$scope.loading2 = false;
			$scope.userTaskTab = true;

		});
	}



	$scope.back = function(){
		$scope.titleTab = true;
		$scope.userTaskTab = false;
		
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