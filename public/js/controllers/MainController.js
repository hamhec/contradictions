var Expdiag;
(function (Expdiag) {
    var Controllers;
    (function (Controllers) {
        "use strict";
        var MainController = (function () {
            function MainController($route, $location, $cookies, $mdDialog, $mdSidenav) {
                this.$route = $route;
                this.$location = $location;
                this.$cookies = $cookies;
                this.$mdDialog = $mdDialog;
                this.$mdSidenav = $mdSidenav;
                this.version = "0.0.1";
            }
            MainController.prototype.goTo = function (page) {
                this.$location.path(page);
                this.$route.reload();
            };
            MainController.prototype.toggleSidenav = function (menuId) {
                this.$mdSidenav(menuId).toggle();
            };
            MainController.prototype.showNotCompleted = function (ev) {
                this.$mdDialog.show(this.$mdDialog.alert()
                    .parent(angular.element(document.querySelector('#content')))
                    .clickOutsideToClose(true)
                    .title('Oops!')
                    .textContent("This functionnality has no been coded yet, please take a look at our Github: <a href='https://github.com/hamhec/lifer'><md-button>Lifer Github</md-button></a>")
                    .ariaLabel('Alert, Not coded yet')
                    .ok('Ok')
                    .targetEvent(ev));
            };
            MainController.prototype.domainGoTo = function (domain) {
                this.$cookies.putObject('domain', domain);
                this.goTo('/domain');
            };
            MainController.prototype.openMenu = function ($mdOpenMenu, ev) {
                $mdOpenMenu(ev);
            };
            return MainController;
        }());
        Controllers.MainController = MainController;
        Expdiag.angularApp.controller("MainController", ['$route', '$location', '$cookies', '$mdDialog', '$mdSidenav', MainController]);
    })(Controllers = Expdiag.Controllers || (Expdiag.Controllers = {}));
})(Expdiag || (Expdiag = {}));
