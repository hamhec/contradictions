var Expdiag;
(function (Expdiag) {
    var Services;
    (function (Services) {
        "use strict";
        var QuestionService = (function () {
            function QuestionService($http, $cookies) {
                this.$http = $http;
                this.$cookies = $cookies;
            }
            QuestionService.prototype.nextQuestion = function () {
                var request = this.$http.post('api/questions/next', null);
                return request;
            };
            QuestionService.prototype.getQuestion = function (qid) {
                var data = { id: qid };
                var request = this.$http.post('api/questions/question', data);
                return request;
            };
            QuestionService.prototype.submitAnswer = function (data) {
                var request = this.$http.post('api/questions/answer', data);
                return request;
            };
            return QuestionService;
        }());
        Services.QuestionService = QuestionService;
        Expdiag.angularApp.service("QuestionService", ['$http', '$cookies', QuestionService]);
    })(Services = Expdiag.Services || (Expdiag.Services = {}));
})(Expdiag || (Expdiag = {}));
