var Expdiag;
(function (Expdiag) {
    var Controllers;
    (function (Controllers) {
        "use strict";
        var ctrl;
        var QuestionController = (function () {
            function QuestionController($route, $location, $cookies, $scope, $interval, QuestionService) {
                var _this = this;
                this.$route = $route;
                this.$location = $location;
                this.$cookies = $cookies;
                this.$scope = $scope;
                this.$interval = $interval;
                this.QuestionService = QuestionService;
                this.evaluations = [
                    { text: "L'explication est trés claire", value: 5 },
                    { text: "L'explication est claire", value: 4 },
                    { text: "L'explication est moyenne", value: 3 },
                    { text: "L'explication n'est pas claire", value: 2 },
                    { text: "L'explication n'est pas claire du tout", value: 1 }
                ];
                this.helper = {
                    justify: false,
                    timeout: false,
                    max: 120000,
                    minutes: 2,
                    seconds: 0,
                    progressBar: 100,
                    progressBarIncrement: (1 / 12),
                    start: 0,
                    time: 0,
                };
                this.QuestionService.nextQuestion().then(function (response) {
                    var data = response.data;
                    if (data.finished === undefined) {
                        _this.world = data;
                    }
                    else {
                        _this.$location.path("/score");
                    }
                });
                ctrl = this;
                $scope.$on('$destroy', function () { ctrl.cancelIntervals(); });
            }
            QuestionController.prototype.getQuestion = function () {
                var _this = this;
                this.QuestionService.getQuestion(this.world.id).then(function (response) {
                    _this.question = response.data;
                    _this.startTimers();
                });
            };
            QuestionController.prototype.answer = function () {
                this.cancelIntervals();
                this.data.answer_time = this.helper.max - this.helper.time;
                this.data.question_id = this.question.id;
                this.helper.justify = true;
                this.helper.progressBar = 100;
                this.helper.progressBarIncrement = (1 / 6);
                this.helper.max = 60000;
                this.startTimers();
            };
            QuestionController.prototype.justify = function () {
                var _this = this;
                this.cancelIntervals();
                this.data.justification_time = this.helper.max - this.helper.time;
                this.sendData().then(function (response) {
                    _this.$route.reload();
                });
            };
            QuestionController.prototype.startTimers = function () {
                this.helper.start = new Date().getTime();
                this.justificationTimer = this.$interval(this.timerFunction, 900);
                this.moveProgressBarTimer = this.$interval(this.moveProgressBarTimerFunction, 100);
                this.updateProgressBarTimer = this.$interval(this.updateProgressBarTimerFunction, 5000);
            };
            QuestionController.prototype.sendData = function () {
                return this.QuestionService.submitAnswer(this.data);
            };
            QuestionController.prototype.timerFunction = function (iteration) {
                ctrl.helper.time = ctrl.helper.max - (new Date().getTime() - ctrl.helper.start);
                var time = Math.floor(ctrl.helper.time / 1000);
                ctrl.helper.minutes = Math.floor(time / 60);
                ctrl.helper.seconds = time % 60;
                if (ctrl.helper.time < 0) {
                    ctrl.cancelIntervals();
                    ctrl.helper.progressBar = 100;
                    ctrl.helper.minutes = 2;
                    ctrl.helper.seconds = 0;
                    if (!ctrl.helper.justify) {
                        if (ctrl.data != undefined && ctrl.data.answer !== null) {
                            ctrl.answer();
                        }
                        else {
                            ctrl.helper.timeout = true;
                        }
                    }
                    else {
                        if (ctrl.data.justification !== null) {
                            ctrl.justify();
                        }
                        else {
                            this.sendData();
                            ctrl.helper.timeout = true;
                        }
                    }
                }
            };
            QuestionController.prototype.moveProgressBarTimerFunction = function (iteration) {
                ctrl.helper.progressBar -= ctrl.helper.progressBarIncrement;
            };
            QuestionController.prototype.updateProgressBarTimerFunction = function (iteration) {
                ctrl.helper.progressBar = ctrl.helper.time * ctrl.helper.progressBarIncrement / 100;
            };
            QuestionController.prototype.cancelIntervals = function () {
                ctrl.$interval.cancel(ctrl.moveProgressBarTimer);
                ctrl.$interval.cancel(ctrl.updateProgressBarTimer);
                ctrl.$interval.cancel(ctrl.justificationTimer);
                ctrl.$interval.cancel(ctrl.answerTimer);
            };
            QuestionController.prototype.reload = function () {
                this.$route.reload();
            };
            return QuestionController;
        }());
        Controllers.QuestionController = QuestionController;
        Expdiag.angularApp.controller("QuestionController", ['$route', '$location', '$cookies', '$scope', '$interval', 'QuestionService', QuestionController]);
    })(Controllers = Expdiag.Controllers || (Expdiag.Controllers = {}));
})(Expdiag || (Expdiag = {}));
