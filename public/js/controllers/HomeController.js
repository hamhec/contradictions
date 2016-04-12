var Expdiag;
(function (Expdiag) {
    var Controllers;
    (function (Controllers) {
        "use strict";
        var HomeController = (function () {
            function HomeController($route, $location, $cookies, UserService) {
                this.$route = $route;
                this.$location = $location;
                this.$cookies = $cookies;
                this.UserService = UserService;
                this.ages = [15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60];
                this.user = $cookies.get('user');
            }
            HomeController.prototype.login = function () {
                var _this = this;
                var user = {
                    sexe: this.gender,
                    age: this.age
                };
                this.UserService.login(user).then(function (response) {
                    _this.$location.path("/questions");
                });
            };
            HomeController.prototype.logout = function () {
                var _this = this;
                this.UserService.logout().then(function (response) {
                    _this.user = null;
                    _this.$location.path("/home");
                });
            };
            return HomeController;
        }());
        Controllers.HomeController = HomeController;
        Expdiag.angularApp.controller("HomeController", ['$route', '$location', '$cookies', 'UserService', HomeController]);
    })(Controllers = Expdiag.Controllers || (Expdiag.Controllers = {}));
})(Expdiag || (Expdiag = {}));
