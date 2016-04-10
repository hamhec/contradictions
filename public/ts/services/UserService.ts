module Expdiag.Services {
    "use strict";

    export class UserService {

        constructor(public $http: ng.IHttpService, public $cookies: ng.cookies.ICookiesService) {
        }

        public login(user : Expdiag.IUserAccount): ng.IHttpPromise<any> {
          var request = this.$http.post('api/login', user);
          request.then( (response: any): void => {
            this.$cookies.put('user', response.data);
          });
          return request;
        }

        public logout(): ng.IHttpPromise<any> {
          var request = this.$http.post('api/logout', null);
          request.then( (response: any): void => {
            this.$cookies.remove('user');
          });
          return request;
        }

        public loggedUser(): ng.IPromise<any> {
          var request = this.$http.post('api/user', null);
          request.then((response: any): void => {
            var data = response.data;
            if(data !== "null") {
              this.$cookies.putObject('user', data.user_id);
            } else {
              this.$cookies.remove('user');
            }
          });
          return request;
        }
    }

    angularApp.service("UserService", ['$http', '$cookies', UserService]);
}
