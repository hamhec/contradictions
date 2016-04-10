var Expdiag;
(function (Expdiag) {
    var Controllers;
    (function (Controllers) {
        "use strict";
        var ScoreController = (function () {
            function ScoreController($route, $location, $cookies, ScoreService) {
                this.$route = $route;
                this.$location = $location;
                this.$cookies = $cookies;
                this.ScoreService = ScoreService;
            }
            return ScoreController;
        }());
        Controllers.ScoreController = ScoreController;
        Expdiag.angularApp.controller("ScoreController", ['$route', '$location', '$cookies', 'ScoreService', ScoreController]);
    })(Controllers = Expdiag.Controllers || (Expdiag.Controllers = {}));
})(Expdiag || (Expdiag = {}));
