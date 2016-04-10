var Expdiag;
(function (Expdiag) {
    var Services;
    (function (Services) {
        "use strict";
        var ScoreService = (function () {
            function ScoreService($http, $cookies) {
                this.$http = $http;
                this.$cookies = $cookies;
            }
            ScoreService.prototype.score = function () {
                var request = this.$http.post('api/score', null);
                return request;
            };
            return ScoreService;
        }());
        Services.ScoreService = ScoreService;
        Expdiag.angularApp.service("ScoreService", ['$http', '$cookies', ScoreService]);
    })(Services = Expdiag.Services || (Expdiag.Services = {}));
})(Expdiag || (Expdiag = {}));
