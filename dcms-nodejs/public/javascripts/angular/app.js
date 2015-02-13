angular.module('DcmsApp', ['ngCookies', 'ngResource', 'ngMessages', 'ngRoute', 'mgcrea.ngStrap'])
  .config(['$locationProvider','$routeProvider',function($locationProvider,$routeProvider) {
  	$locationProvider.html5Mode(true);

  	$routeProvider
	  .when('/', {
	    templateUrl: 'views/home.html',
	    controller: 'MainCtrl'
	  })
	  .when('/login', {
	    templateUrl: 'views/login.html',
	    controller: 'LoginCtrl'
	  })
	  .when('/signup', {
	    templateUrl: 'views/signup.html',
	    controller: 'SignupCtrl'
	  })
	  .otherwise({
	    redirectTo: '/'
	  });
  }]);