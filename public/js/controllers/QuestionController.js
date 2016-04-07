var Expdiag;
(function (Expdiag) {
    var Controllers;
    (function (Controllers) {
        "use strict";
        var QuestionController = (function () {
            function QuestionController($route, $location, $cookies) {
                this.$route = $route;
                this.$location = $location;
                this.$cookies = $cookies;
            }
            return QuestionController;
        }());
        Controllers.QuestionController = QuestionController;
        Expdiag.angularApp.controller("QuestionController", ['$route', '$location', '$cookies', QuestionController]);
    })(Controllers = Expdiag.Controllers || (Expdiag.Controllers = {}));
})(Expdiag || (Expdiag = {}));
