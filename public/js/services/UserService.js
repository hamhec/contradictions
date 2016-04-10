var Expdiag;
(function (Expdiag) {
    var Services;
    (function (Services) {
        "use strict";
        var UserService = (function () {
            function UserService($http, $cookies) {
                this.$http = $http;
                this.$cookies = $cookies;
            }
            UserService.prototype.login = function (user) {
                var _this = this;
                var request = this.$http.post('api/login', user);
                request.then(function (response) {
                    _this.$cookies.put('user', response.data);
                });
                return request;
            };
            UserService.prototype.logout = function () {
                var _this = this;
                var request = this.$http.post('api/logout', null);
                request.then(function (response) {
                    _this.$cookies.remove('user');
                });
                return request;
            };
            UserService.prototype.loggedUser = function () {
                var _this = this;
                var request = this.$http.post('api/user', null);
                request.then(function (response) {
                    var data = response.data;
                    if (data !== "null") {
                        _this.$cookies.putObject('user', data.user_id);
                    }
                    else {
                        _this.$cookies.remove('user');
                    }
                });
                return request;
            };
            return UserService;
        }());
        Services.UserService = UserService;
        Expdiag.angularApp.service("UserService", ['$http', '$cookies', UserService]);
    })(Services = Expdiag.Services || (Expdiag.Services = {}));
})(Expdiag || (Expdiag = {}));
