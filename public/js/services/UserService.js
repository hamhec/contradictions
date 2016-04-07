var Expdiag;
(function (Expdiag) {
    var Services;
    (function (Services) {
        "use strict";
        var UserService = (function () {
            function UserService($http) {
                this.$http = $http;
            }
            UserService.prototype.login = function (user) {
                var request = this.$http.post('api/login', user);
                return request;
            };
            UserService.prototype.logout = function () {
                var request = this.$http.post('api/logout', null);
                return request;
            };
            return UserService;
        }());
        Services.UserService = UserService;
        Expdiag.angularApp.service("UserService", ['$http', UserService]);
    })(Services = Expdiag.Services || (Expdiag.Services = {}));
})(Expdiag || (Expdiag = {}));
