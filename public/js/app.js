var mainApp = angular.module("mainApp", ['ngRoute']);
 
mainApp.config(function($routeProvider) {
    $routeProvider
        .when('/home', {
            templateUrl: 'testNgRoute/home.html'
        })
        .when('/viewLists', {
            templateUrl: 'testNgRoute/viewLists.php'
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

	//initialize formData
	$scope.formData = {};
	//initialize submit function
	$scope.submitForm = function(id){
		 var data = this.formData;
		//TODO do ajax call and handle invalid or successful signups.
		 console.log(data.password);
		 console.log(id);

		var dataObj = {
				id: id,
				password: data.password
		};

		console.log(dataObj);

		var res = $http.post('/checkpassword', dataObj);
		res.success(function(data, status, headers, config) {
			if(data == "success"){
				$scope.formData.password = "";
				$scope.statusmsg = "Success";
			}else{
				$scope.statusmsg = "Password is incorrect! Please try again.";
			}
			
		});
		res.error(function(data, status, headers, config) {
			$scope.statusmsg = "failed";
		});

		        
		
		

	}




	$scope.loading = false;
	$scope.titleTab = true;

	//loading before usertask
	$scope.loading2 = false;
	$scope.inputpassword = [];


	$scope.count = 0;
	$scope.myFunction = function() {
       			 $scope.count++;
    	}

	$scope.front = function(index){
		$scope.titleTab = false;
		$scope.loading2 = true;
		
		var list = $scope.usertasks[index];
		$scope.tmpTasks = $scope.tasks[index];

		$http.get('todoapp/'+ list.id).success(function(data, status, headers, config) {
			$scope.listsuser = data;
			$scope.userTaskTab = true;
			$scope.loading2 = false;
			$scope.test = true;


		});

	}


	$scope.getUserDetail = function(id){

		 $scope.statusmsg = "";
		 $scope.formData.password = "";
		$http.get('api/usertasks/'+id).success(function(data, status, headers, config) {
			$scope.tmpUsertask = data;
		});
		
	}

	$scope.checkpassword = function(id){
		

		

	
		
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