var OutcomeApp;
(function (OutcomeApp) {
    var Directives;
    (function (Directives) {
        function todo($timeout) {
            return {
                restrict: "E",
                scope: {
                    data: "="
                },
                transclude: true,
                controller: Controllers.TodoController,
                controllerAs: "vm",
                templateUrl: "js/views/todo.tmpl.html",
            };
        }
        Directives.todo = todo;
        angularApp.directive('todo', ['$timeout', todo]);
    })(Directives = OutcomeApp.Directives || (OutcomeApp.Directives = {}));
})(OutcomeApp || (OutcomeApp = {}));
