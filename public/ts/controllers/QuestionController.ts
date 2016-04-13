module Expdiag.Controllers {
    "use strict";
    var ctrl:QuestionController;
    export class QuestionController {

        constructor(public $route: ng.route.IRouteService,
          public $location: ng.ILocationService,
          public $cookies: ng.cookies.ICookiesService,
          public $scope: ng.IScope,
          public $interval: ng.IIntervalService,
          public QuestionService: Expdiag.Services.QuestionService) {
            this.QuestionService.nextQuestion().then( (response: any): void => {
              var data = response.data;
              if(data.finished === undefined) {
                this.world = data;
              } else {
                this.$location.path("/score");
                //this.$route.reload();
              }
            });
            ctrl = this;
            $scope.$on('$destroy', function () {ctrl.cancelIntervals()});
        }

        public evaluations = [
          {text: "L'explication est trés claire" , value: 5},
          {text: "L'explication est claire" , value: 4},
          {text: "L'explication est moyenne" , value: 3},
          {text: "L'explication n'est pas claire" , value: 2},
          {text: "L'explication n'est pas claire du tout" , value: 1}
        ];

        public world: IWorld;
        public question: IQuestion;
        public helper = {
          justify: false,
          timeout: false,
          max: 120000,
          minutes: 2,
          seconds: 0,
          progressBar: 100,
          progressBarIncrement: (1/12),
          start: 0,
          time: 0,
        }

        private answerTimer: ng.IPromise<any>;
        private justificationTimer: ng.IPromise<any>;
        private moveProgressBarTimer: ng.IPromise<any>;
        private updateProgressBarTimer: ng.IPromise<any>;

        public data: IAnswer;

        public getQuestion():void {
          this.QuestionService.getQuestion(this.world.id).then((response:any):void => {
            this.question = response.data;
            // TODO: start timer and all
            this.startTimers();
          });
        }

        public answer(): void {
          this.cancelIntervals();
          this.data.answer_time = this.helper.max - this.helper.time;
          this.data.question_id = this.question.id;

          // Justification
          this.helper.justify = true;
          this.helper.progressBar = 100;
          this.helper.progressBarIncrement = (1/6);
          this.helper.max = 60000;

          this.startTimers();
        }

        public justify() : void {
            this.cancelIntervals();
            this.data.justification_time = this.helper.max - this.helper.time;

            // Send all data
            this.sendData().then((response: any) => {
              this.$route.reload();
            });
        }

        private startTimers():void {
          this.helper.start = new Date().getTime();
          this.justificationTimer = this.$interval(this.timerFunction, 900);
          // move Progress Bar
          this.moveProgressBarTimer = this.$interval(this.moveProgressBarTimerFunction, 100);
          // update Progress Bar
          this.updateProgressBarTimer = this.$interval(this.updateProgressBarTimerFunction, 5000);
        }

        private sendData(): ng.IPromise<any> {
          return this.QuestionService.submitAnswer(this.data);
        }

        private timerFunction(iteration) {
          // How many mms since we started
          ctrl.helper.time = ctrl.helper.max - (new Date().getTime() - ctrl.helper.start);
          var time = Math.floor(ctrl.helper.time / 1000);
          ctrl.helper.minutes = Math.floor(time / 60);
          ctrl.helper.seconds = time % 60;

          if(ctrl.helper.time < 0) {
            ctrl.cancelIntervals();
            ctrl.helper.progressBar = 100;
            ctrl.helper.minutes = 2;
            ctrl.helper.seconds = 0;
            if(!ctrl.helper.justify) {
              // If an answer has been chosen then post it
              if(ctrl.data != undefined && ctrl.data.answer !== null) {
                ctrl.answer();
              } else { // No answer so time out
                ctrl.helper.timeout = true;
              }
            } else {
                if(ctrl.data.justification !== null){ // timeout and we are justifying
                ctrl.justify();
              } else {
                this.sendData();
                ctrl.helper.timeout = true;
              }
            }
          }
        }
        private moveProgressBarTimerFunction(iteration) {
          ctrl.helper.progressBar -= ctrl.helper.progressBarIncrement;
        }
        private updateProgressBarTimerFunction(iteration) {
          ctrl.helper.progressBar = ctrl.helper.time * ctrl.helper.progressBarIncrement / 100;
        }

        public cancelIntervals():void {
          ctrl.$interval.cancel(ctrl.moveProgressBarTimer);
          ctrl.$interval.cancel(ctrl.updateProgressBarTimer);
          ctrl.$interval.cancel(ctrl.justificationTimer);
          ctrl.$interval.cancel(ctrl.answerTimer);
        }


        public reload() {
          this.$route.reload();
        }
    }

    angularApp.controller("QuestionController", ['$route', '$location', '$cookies', '$scope', '$interval', 'QuestionService', QuestionController]);
}
