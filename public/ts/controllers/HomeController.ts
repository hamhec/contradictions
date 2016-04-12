module Expdiag.Controllers {
    "use strict";

    export class HomeController {

        constructor(public $route: ng.route.IRouteService,
          public $location: ng.ILocationService,
          public $cookies: ng.cookies.ICookiesService,
          public UserService: Expdiag.Services.UserService) {
            this.user = $cookies.get('user');
        }
        public user;
        public gender;
        public age;

        public ages = [15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60];

        // =========================
        // General functions
        // =========================
        public login(): void {
            var user : IUserAccount = {
              sexe: this.gender,
              age: this.age
            }

            this.UserService.login(user).then( (response: any): void => {
              this.$location.path("/questions");
            });
        }

        public logout(): void {
          this.UserService.logout().then((response: any): void => {
            this.user = null;
            this.$location.path("/home");
            //this.$route.reload();
          });
        }
    }

    angularApp.controller("HomeController", ['$route', '$location', '$cookies','UserService', HomeController]);
}
