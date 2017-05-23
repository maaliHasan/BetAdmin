angular.module('app', ['ui.bootstrap']);

var sortingOrder = 'email'; //default sort

angular.module('app').controller('PaginationDemoCtrl', function($scope, $filter, $http) {
	$scope.sortingOrder = sortingOrder;
	$scope.currentPage = 1;
	$scope.itemsPerPage= 10;
	$scope.filteredItems = [];
	$scope.users = [];
	$scope.pageSizes = [10,20,50,100,150,200];
	$scope.reverse = false;
	
	getData();

	function getData() {
		console.log("./wrapper.php/?page="+$scope.currentPage+"&length="+$scope.itemsPerPage);
		$http.get("./wrapper.php/?page="+$scope.currentPage+"&length="+$scope.itemsPerPage)
		.then(function(response) {
			$scope.id = (response.data.currentPage-1)*$scope.itemsPerPage;
			$scope.count = response.data.usersCount;
			$scope.users = response.data.users;
			angular.copy(response.data.users.length, $scope.count);
		});
	}

	//get another portions of data on page changed
	$scope.pageChanged = function() {
		getData();
	};
  
	// show users per page
	$scope.perPage = function () {
		$scope.groupToPages();
	};
  
	// calculate page in place
	$scope.groupToPages = function () {
		$scope.pagedItems = [];
		for (var i = 0; i < $scope.filteredItems.length; i++) {
			if (i % $scope.itemsPerPage === 0) {
				$scope.pagedItems[Math.floor(i / $scope.itemsPerPage)] = [ $scope.filteredItems[i] ];
			} else {
				$scope.pagedItems[Math.floor(i / $scope.itemsPerPage)].push($scope.filteredItems[i]);
			}
		}
		$scope.pageChanged();
	};
	
	// init the filtered users
	$scope.search = function () {
		$scope.filteredItems = $filter('filter')($scope.users, function (user) {
			for(var attr in user) {
				if(typeof user[attr] === 'string' && searchMatch(user[attr], $scope.query))
					return true;
			}
			return false;
		});
		
		// take care of the sorting order
		if ($scope.sortingOrder !== '') {
			$scope.filteredItems = $filter('orderBy')($scope.filteredItems, $scope.sortingOrder, $scope.reverse);
		}
		$scope.currentPage = 1;
		// now group by pages
		$scope.groupToPages();
	};
	
	var searchMatch = function (haystack, needle) {
		console.log(needle);
		if (!needle) {
			return true;
		}
		return haystack.toLowerCase().indexOf(needle.toLowerCase()) !== -1;
	};
	
	$scope.exportDataToCSV=function() {
		console.log("start downloading");
	}
});