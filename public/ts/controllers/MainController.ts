module Expdiag.Controllers {
    "use strict";

    export class MainController {
        public version="0.0.1";

        constructor(public $route: ng.route.IRouteService,
          public $location: ng.ILocationService,
          public $cookies: ng.cookies.ICookiesService,
          public $mdSidenav: ng.material.ISidenavService) {
            console.log("call to constructor on main");
        }


        // =========================
        // General functions
        // =========================
        goTo(page:string):void {
          this.$location.path(page);
          //this.$route.reload();
        }

        toggleSidenav(menuId:string) {
          this.$mdSidenav(menuId).toggle();
        }

        printTime(time: number): string {
          var tmp = Math.floor(time / 1000);
          var minutes = Math.floor(tmp / 60);
          var seconds = tmp % 60;
          return minutes + "m " + seconds + "s";
        }
    }

    angularApp.controller("MainController", ['$route', '$location', '$cookies', '$mdSidenav', MainController]);
}
