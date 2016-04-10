module Expdiag.Services {
    "use strict";

    export class QuestionService {

        constructor(public $http: ng.IHttpService, public $cookies: ng.cookies.ICookiesService) {
        }

        public nextQuestion(): ng.IHttpPromise<any> {
          var request = this.$http.post('api/questions/next', null);
          return request;
        }

        public getQuestion(qid:number): ng.IHttpPromise<any> {
          var data = {id: qid};
          var request = this.$http.post('api/questions/question', data);
          return request;
        }

        public submitAnswer(data: IAnswer) {
          var request = this.$http.post('api/questions/answer', data);
          return request;
        }
    }

    angularApp.service("QuestionService", ['$http', '$cookies', QuestionService]);
}
