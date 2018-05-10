app.controller("customersCtrl", function($scope, $http){
	$scope.getCustomers = function(){
		$http.get("customers.php")
		.then(function(response){
			$scope.names = response.data;
		});
	}
	$scope.firstname = "";
	$scope.lastname = "";
	$scope.country = "";
	$scope.address = "";
	$scope.id = "";
	$scope.create = function(){
		
		$http({
			method: "POST",
			url: "create.php?q",
			data: {firstname: $scope.firstname,
				lastname: $scope.lastname,
				country: $scope.country,
				address: $scope.address}
		})
		.then(function(response){
			console.log(response);
				$scope.reset();
				$scope.getCustomers();
		})
	}
	$scope.update = function(){
		$http({
			method: "POST",
			url: "update.php?q",
			data: {firstname: $scope.firstname,
				lastname: $scope.lastname,
				country: $scope.country,
				address: $scope.address,
				id: $scope.id}
		})
		.then(function(response){
			console.log(response);
			$scope.reset();
			$scope.getCustomers();
		})
	}
	$scope.delete = function(){
		$http({
			method: "POST",
			url: "delete.php?q",
			data: {
				id: $scope.id}
		})
		.then(function(response){
			console.log(response);
			$scope.reset();
			$scope.getCustomers();
		})
	}
	$scope.reset = function(){
		$scope.firstname = "";
		$scope.lastname = "";
		$scope.country = "";
		$scope.address = "";
		$scope.id = "";
	}
	
});

