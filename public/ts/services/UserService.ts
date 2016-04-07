module Expdiag.Services {
    "use strict";

    export class UserService {

        constructor(public $http: ng.IHttpService) {
        }

        public login(user : Expdiag.IUser): ng.IHttpPromise<any> {
          var request = this.$http.post('api/login', user);
          return request;
        }

        public logout(): ng.IHttpPromise<any> {
          var request = this.$http.post('api/logout', null);
          return request;
        }

    }

    angularApp.service("UserService", ['$http', UserService]);
}
