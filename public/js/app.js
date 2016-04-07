var Expdiag;
(function (Expdiag) {
    "use strict";
    Expdiag.angularApp = angular.module('angularApp', ['ngMaterial', 'ngAnimate', 'ngRoute', 'ngCookies', 'ngMessages']);
    Expdiag.angularApp.config(function ($routeProvider, $locationProvider) {
        $routeProvider.when('/home', {
            templateUrl: 'js/views/home.html',
            controller: 'HomeController as home'
        });
        $routeProvider.when('/questions', {
            templateUrl: 'js/views/question.html',
            controller: 'QuestionController as question'
        });
        $routeProvider.otherwise({ redirectTo: '/home' });
    })
        .config(function ($mdThemingProvider) {
    });
    Expdiag.angularApp.run(function ($route, $rootScope, $location, $cookies) {
        $rootScope.$on('$routeChangeStart', function (event, next, current) {
            var user = $cookies.getObject('user');
            if ($location.path() !== "" && ($location.path() != "/home") && (user == null)) {
                $location.path('/home');
                $route.reload();
            }
        });
    });
})(Expdiag || (Expdiag = {}));
