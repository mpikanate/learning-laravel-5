
mainApp.controller('CreateNewItemController', function($scope, $http, $location,$filter) {
	$scope.test = "Hello, World!";

	      $scope.user = {};
      $scope.update = function(user) {

        var dataObj = $scope.user;
        
        console.log(dataObj);

         var res = $http.post('/createtask', dataObj);
		res.success(function(data, status, headers, config) {
			$scope.msg = data;
			alert("Create Successful!");
			$location.path('/home');

		});
		res.error(function(data, status, headers, config) {
			//error connection
			alert("error!");
		}); 

      };

      $scope.reset = function() {
        $scope.user = angular.copy($scope.master);
      };

      $scope.init = function() {
        $http.get('api/users').success(function(data, status, headers, config) {
			$scope.userlists = data;
			//console.log($scope.userlists);
	});
      };
      
      $scope.init();
      $scope.reset();
});