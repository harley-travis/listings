<?php include(dirname(__FILE__)."/header.php"); ?>

<div ng-view class="container"></div>

<script>
	// global array - store info in this mother !@#$er
	var ringArray = []; 
	
	// the switch 
	var app = angular.module("whiteJuly", ["ngRoute"]);
	app.config(function($routeProvider) {
		
		$routeProvider
		.when("/", {
			templateUrl : "band.php",
		})
		.when("/band", {
			templateUrl : "band.php",
		})
		.when("/color", {
			templateUrl : "color.php"
		})
		.when("/stone", {
			templateUrl : "stone.php"
		})
		.when("/inscription", {
			templateUrl : "inscription.php"
		})
		.when("/cut", {
			templateUrl : "cut.php"
		})
		.when("/checkout", {
			templateUrl : "customerInfo.php"
		});
	});
	
	// BandData
	app.controller('bandData', function($scope, $http) {
	  $http.get("../data/band.json").then(function (response) {
		 
		  $scope.bandtypes = response.data.band; // bandtypes = loop band=json
		  
		  $scope.bandtypes[0].productOptions;
		  
		  
		  // THIS IS A LOOP FOR NESTED OBJECTS
		 // $scope.productOptions = []; // create a global array to store in the next level of JSON data
		  
		  // loop through the nested json elements to repeat 
		//  angular.forEach($scope.bandtypes, function(band){
			//  angular.forEach(band.productOptions, function(productOptions){
//
				  
				 // 	$scope.productOptions.push(productOptions);
		//			  
				  
		//	  })
		 // });
	  });
	});
	
	// BandSizes
	app.controller('band-size', function($scope, $http) {
		$http.get("../data/band.json").then(function (response){
			$scope.sizes = response.data.size;
		});
	});
	
	// BandCategory
	app.controller('band-category', function($scope, $http) {
		$http.get("../data/band.json").then(function (response) {
			$scope.category = response.data.category;
		});
	});
	
	// ColorData
	app.controller('colorData', function($scope, $http) {
	  $http.get("../data/color.json").then(function (response) {
		  $scope.colortypes = response.data.color;
		  $scope.price = function(colorPrice){
			  addPrice(colorPrice);
		  };
	  });
	});
	
	// StoneData
	app.controller('stoneData', function($scope, $http) {
	  $http.get("../data/stone.json").then(function (response) {
		  $scope.stonetypes = response.data.stone;
	  });
	});
	
	// ClarityOptions
	app.controller('clarity', function($scope) {
		$scope.clarity = ["good", "really good", "too good", "you're too rich sthap"];
	});
	
	// CutData
	app.controller('cutData', function($scope, $http) {
	  $http.get("../data/cut.json").then(function (response) {
		  $scope.cuttypes = response.data.cut;
	  });
	});



</script>


<?php include(dirname(__FILE__)."/footer.php"); ?>