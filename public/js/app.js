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
            controller: 'QuestionController as ques'
        });
        $routeProvider.when('/score', {
            templateUrl: 'js/views/score.html',
            controller: 'ScoreController as score'
        });
        $routeProvider.otherwise({ redirectTo: '/home' });
    })
        .config(function ($mdThemingProvider) {
    });
    Expdiag.angularApp.run(function ($route, $rootScope, $location, $cookies, UserService) {
        console.log($rootScope.infos);
        $rootScope.$on('$routeChangeStart', function (event, next, current) {
            UserService.loggedUser().then(function (response) {
                $rootScope.infos = response.data.infos;
                if ($rootScope.infos == undefined) {
                    $rootScope.infos = {
                        total_questions: 0,
                        score: {
                            points: 0,
                            answered_questions: 0,
                            total_time: 0,
                        },
                        achievements: []
                    };
                }
            });
            var user = $cookies.getObject('user');
            if ($location.path() !== "" && ($location.path() != "/home") && (user == null)) {
                $location.path('/home');
            }
        });
    });
    Expdiag.angularApp.filter("trust", ['$sce', function ($sce) {
            return function (htmlCode) {
                return $sce.trustAsHtml(htmlCode);
            };
        }]);
})(Expdiag || (Expdiag = {}));
