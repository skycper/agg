deps = ['ionic'];

agg = angular.module('agg', deps).filter(  
    'to_trusted', ['$sce', function ($sce) {  
        return function (text) {  
            return $sce.trustAsHtml(text);  
        }  
    }]
);

//set up route
agg.config(function($stateProvider, $urlRouterProvider, $ionicConfigProvider) {
	$ionicConfigProvider.views.maxCache(5);
	// note that you can also chain configs
	$ionicConfigProvider.backButton.text('返回').icon('ion-chevron-left')
	  // agg.routeProvider  = $routeProvider;
	  // $routeProvider.
	  //     when('/user', {templateUrl: 'views/user.html'}).
	  //     otherwise({redirectTo: '/'});
	$stateProvider
		.state('index', {
			url: '/',
			templateUrl: 'home.html'
	})
		.state('pets', {
			url: '/pets',
			templateUrl: 'views/pets/index.html'
	})
		.state('pets.list', {
			url: '/list',
			templateUrl: 'views/pets/list.html'
	});

	$urlRouterProvider.otherwise("/");
});

agg.controller('appController', function($scope, $timeout, $http){
	$scope.test = 'testangular';
	
});

agg.controller('petController', function($scope, $http, $ionicModal){
	$ionicModal.fromTemplateUrl('views/pets/create.html', {
		scope: $scope,
		animation: 'slide-in-up'
	}).then(function(modal) {
		$scope.modal = modal;
	});
	$scope.openCreatePetModal = function() {
		$scope.modal.show();
	};
	$scope.closeCreatePetModal = function() {
		$scope.modal.hide();
	};
	//Cleanup the modal when we're done with it!
	$scope.$on('$destroy', function() {
		$scope.modal.remove();
	});
	// Execute action on hide modal
	$scope.$on('modal.hidden', function() {
	// Execute action
	});
	// Execute action on remove modal
	$scope.$on('modal.removed', function() {
	// Execute action
	});
	
});