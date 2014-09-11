var phonecatApp = angular.module('phonecatApp',[]);

phonecatApp.controller('PhoneListCtrl', ['$scope', '$http', function ($scope, $http){
	$http.get('http://touiteur.3ie.fr/api/touite/get_publics?token=6b3a870fce611418f8d265fd8be91f01&item_by_page=10&page=1').success(function(data){
		$scope.tweets = data.data.tweets;
	});
	$scope.pages = 1;
	$scope.touites = 10;
	$scope.refresh = function(){
		$http.get('http://touiteur.3ie.fr/api/touite/get_publics?token=6b3a870fce611418f8d265fd8be91f01&item_by_page='+$scope.touites+'&page='+$scope.pages).success(function(data){
		$scope.tweets = data.data.tweets;
	});
	}

}]);