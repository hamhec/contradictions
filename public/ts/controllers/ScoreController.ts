module Expdiag.Controllers {
    "use strict";

    export class ScoreController {
        constructor(public $route: ng.route.IRouteService,
          public $location: ng.ILocationService,
          public $cookies: ng.cookies.ICookiesService,
          public ScoreService: Expdiag.Services.ScoreService) {
        }

    }

    angularApp.controller("ScoreController", ['$route', '$location', '$cookies', 'ScoreService', ScoreController]);
}
