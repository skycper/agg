deps = ['ngRoute', 'ionic'];

agg = angular.module('agg', deps).filter(  
    'to_trusted', ['$sce', function ($sce) {  
        return function (text) {  
            return $sce.trustAsHtml(text);  
        }  
    }]
);

//set up route
agg.config(['$routeProvider', function($routeProvider) {
	  agg.routeProvider  = $routeProvider;
	  $routeProvider.
	      when('/user', {templateUrl: 'views/user.html'}).
	      otherwise({redirectTo: '/'});
}]);

agg.controller('appController', function($scope, $timeout, $http){
	$scope.test = 'testangular';
	
});