var mainApp = angular.module("mainApp", ['ngRoute','ngAnimate', 'ui.bootstrap' ]);

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

mainApp.controller('todoController', function($scope, $location , $http ,$uibModal, $log) {

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
			}else if(data == "failed"){
				$scope.formData.password = "";
				$scope.statusmsg = "Failed";
			}
			
		});
		res.error(function(data, status, headers, config) {
			//error connection
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
		
		
		var list = $scope.usertasks[index];
		$scope.tmpTasks = $scope.tasks[index];


		$scope.loading2 = true;
		$http.get('todoapp/'+ list.id).success(function(data, status, headers, config) {
			$scope.loading2 = false;
			$scope.listsuser = data;
			$scope.userTaskTab = true;
			
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


	$scope.user = {name: ""}

	  $scope.open = function (id) {
	  	$scope.uid = id;
	    var modalInstance = $uibModal.open({
	      templateUrl: 'myModalContent.html',
	      controller: 'ModalInstanceCtrl',
	      size: '',
	      resolve: {
	        items: function () {
	          return $scope.uid;
	        }
	      }
	    });    
	    modalInstance.result.then(function (selectedItem) {
	      	$scope.selected = selectedItem;
	    }, function () {
	      	$log.info('Modal dismissed at: ' + new Date());
	    });
	  };
	      //$scope.uid = id;
	    
	  //Modal Instance

	  //end modal instance



	$scope.init();



});



// Please note that $uibModalInstance represents a modal window (instance) dependency.
// It is not the same as the $uibModal service used above.

angular.module('mainApp').controller('ModalInstanceCtrl', function($scope, $http ,$uibModalInstance, items) {


		$scope.passwordloading = false;
		  $scope.ok = function () {
		  	$scope.passwordloading = true;
		  	$scope.uid = items;
			var dataObj = {
					id: $scope.uid ,
					password: $scope.user.password
			};

			console.log(dataObj);
			if($scope.user.password == ""){
				$scope.passwordloading = false;
			}else{
				var res = $http.post('/checkpassword', dataObj);
			res.success(function(data, status, headers, config) {
				if(data == "success"){
					$scope.user.password = "";
					$scope.statusmsg = "Success";
					$scope.passwordloading = false;
					$uibModalInstance.close($scope.user,$scope.uid);
					redirectTo('todoapp');
					
				}else if(data == "failed"){
					$scope.user.password = "";
					$scope.statusmsg = "Failed";
					$scope.passwordloading = false;
				}
				
			});
			res.error(function(data, status, headers, config) {
				//error connection
			});
			}
			

		  };

		  $scope.cancel = function () {
		    $uibModalInstance.dismiss('cancel');
		  };


});
