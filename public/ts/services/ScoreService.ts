module Expdiag.Services {
    "use strict";

    export class ScoreService {

        constructor(public $http: ng.IHttpService, public $cookies: ng.cookies.ICookiesService) {
        }

        public score(): ng.IHttpPromise<any> {
          var request = this.$http.post('api/score', null);
          return request;
        }
    }

    angularApp.service("ScoreService", ['$http', '$cookies', ScoreService]);
}
