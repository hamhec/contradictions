module OutcomeApp.Controllers {
    "use strict";

    export class TodoController {
        private open:boolean = true;
        constructor() {}

        isOpen(): boolean {
          return this.open;
        }

        toogle():void {
          this.open = !this.open;
        }
    }

    angularApp.controller("TodoController", TodoController);
}
