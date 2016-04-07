module Expdiag.Controllers {
    "use strict";

    export class MainController {
        public version="0.0.1";

        constructor(public $route: ng.route.IRouteService,
          public $location: ng.ILocationService,
          public $cookies: ng.cookies.ICookiesService,
          public $mdDialog: ng.material.IDialogService,
          public $mdSidenav: ng.material.ISidenavService) {

        }


        // =========================
        // General functions
        // =========================
        goTo(page:string):void {
          this.$location.path(page);
          this.$route.reload();
        }

        toggleSidenav(menuId:string) {
          this.$mdSidenav(menuId).toggle();
        }

        showNotCompleted(ev) {
          this.$mdDialog.show(
            this.$mdDialog.alert()
              .parent(angular.element(document.querySelector('#content')))
              .clickOutsideToClose(true)
              .title('Oops!')
              .textContent("This functionnality has no been coded yet, please take a look at our Github: <a href='https://github.com/hamhec/lifer'><md-button>Lifer Github</md-button></a>")
              .ariaLabel('Alert, Not coded yet')
              .ok('Ok')
              .targetEvent(ev)
          )
        }

        domainGoTo(domain) {
          this.$cookies.putObject('domain', domain);
          this.goTo('/domain');
        }

        openMenu($mdOpenMenu:any, ev:ng.IAngularEvent) {
          $mdOpenMenu(ev);
        }
    }

    angularApp.controller("MainController", ['$route', '$location', '$cookies', '$mdDialog', '$mdSidenav', MainController]);
}
