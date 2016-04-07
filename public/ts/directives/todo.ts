module OutcomeApp.Directives {
    export interface IToDoListScope {
        name: string
    }

    export function todo($timeout): ng.IDirective {
         return {
            restrict: "E",
            scope: {
                data: "="
            },
            transclude: true,
            controller: Controllers.TodoController,
            controllerAs: "vm",
            templateUrl: "js/views/todo.tmpl.html",
        }
     }

     angularApp.directive('todo', ['$timeout', todo]);
}
