module Expdiag.Controllers {
    "use strict";

    export class QuestionController {

        constructor(public $route: ng.route.IRouteService,
          public $location: ng.ILocationService,
          public $cookies: ng.cookies.ICookiesService) {

        }

        // =========================
        // General functions
        // =========================

    }

    angularApp.controller("QuestionController", ['$route', '$location', '$cookies', QuestionController]);
}
