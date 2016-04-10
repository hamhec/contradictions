var Expdiag;
(function (Expdiag) {
    var Controllers;
    (function (Controllers) {
        "use strict";
        var MainController = (function () {
            function MainController($route, $location, $cookies, $mdSidenav) {
                this.$route = $route;
                this.$location = $location;
                this.$cookies = $cookies;
                this.$mdSidenav = $mdSidenav;
                this.version = "0.0.1";
                console.log("call to constructor on main");
            }
            MainController.prototype.goTo = function (page) {
                this.$location.path(page);
            };
            MainController.prototype.toggleSidenav = function (menuId) {
                this.$mdSidenav(menuId).toggle();
            };
            MainController.prototype.printTime = function (time) {
                var tmp = Math.floor(time / 1000);
                var minutes = Math.floor(tmp / 60);
                var seconds = tmp % 60;
                return minutes + "m " + seconds + "s";
            };
            return MainController;
        }());
        Controllers.MainController = MainController;
        Expdiag.angularApp.controller("MainController", ['$route', '$location', '$cookies', '$mdSidenav', MainController]);
    })(Controllers = Expdiag.Controllers || (Expdiag.Controllers = {}));
})(Expdiag || (Expdiag = {}));
