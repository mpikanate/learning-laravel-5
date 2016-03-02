var mainApp = angular.module("mainApp", ['ngRoute','ngAnimate', 'ui.bootstrap' ]);

mainApp.config(function($routeProvider) {
    $routeProvider
        .when('/home', {
            templateUrl: 'testNgRoute/home.html',   
            controller:'todoController'           
        })
         .when('/create', {
            templateUrl: 'testNgRoute/create.html',    
            controller:'CreateNewItemController'     
        })

        .when('/viewLists/:param1', {
            templateUrl: 'testNgRoute/viewLists.html',
            controller:'todoController'
        })
        .otherwise({
            redirectTo: '/home'
        });
});



mainApp.controller('todoController', function($scope, $location , $http ,$uibModal, $log,$rootScope,$routeParams) {
	
	//test communicate between controller
	        $rootScope.$on("CallParentMethod", function(){
	           $scope.updateSigned($scope.curId);

	      });
	    $scope.test2 = function(){
	        	alert("test");
	      }

	$scope.loading = false;
	$scope.titleTab = true;

	//loading before usertask
	$scope.loadingSpin = false;
	$scope.loadingUsertask = false;
	$scope.inputpassword = [];



    	var param1 = $routeParams.param1;

	$scope.front = function(param1){
		$scope.titleTab = false;
		$scope.curId = param1;
		$scope.getUsertaskByID($scope.curId);
		

	}

	$scope.getUsertaskByID = function(id){
		
		
		$http.get('api/tasks/'+ id).success(function(data, status, headers, config) {

			$scope.tmpTasks = data;


		});
		$scope.loadingSpin = true;
		$scope.loadingUsertask = false;
		$http.get('todoapp/'+ id).success(function(data, status, headers, config) {

			$scope.listsuser = data;
			$scope.loadingSpin = false;
			$scope.loadingUsertask = true;


		});
	}

	$scope.updateSigned = function(id){
		$http.get('api/tasks/'+ id).success(function(data, status, headers, config) {

			$scope.tmpTasks = data;


		});
		$http.get('todoapp/'+ id).success(function(data, status, headers, config) {
			
			$scope.listsuser = data;
			$scope.loadingSpin = false;
			$scope.loadingUsertask = true;


		});
	}

	$scope.getUserDetail = function(id){

		 $scope.statusmsg = "";
		 $scope.formData.password = "";
		$http.get('api/usertasks/'+id).success(function(data, status, headers, config) {
			$scope.tmpUsertask = data;
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
	    modalInstance.result.then(function () {
	      	$http.get('todoapp/'+ $scope.curId).success(function(data, status, headers, config) {
			
			$scope.listsuser = data;
			$scope.loadingSpin = false;
			$scope.loadingUsertask = true;


		});
	    }, function () {
	      	$log.info('Modal dismissed at: ' + new Date());
	    });
	  };

	$scope.init();
	$scope.front(param1);


});



// Please note that $uibModalInstance represents a modal window (instance) dependency.
// It is not the same as the $uibModal service used above.

angular.module('mainApp').controller('ModalInstanceCtrl', function($scope, $http ,$uibModalInstance,$rootScope, items) {

		//test communicate between controller
		
		 $scope.childmethod = function() {
		            $rootScope.$emit("CallParentMethod", {});
		}
		  
		    //
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
					//$scope.childmethod();
					$uibModalInstance.close();
				
					
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
