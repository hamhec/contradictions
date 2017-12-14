module Expdiag {
    "use strict";
    export interface IUserAccount {
      sexe: boolean;
      age: number;
    }

    export interface IWorld {
      id: number,
      situation: string
    }

    export interface IQuestion {
      id: number,
      question: string
    }

    export interface IAnswer {
      question_id: number,
      answer: number,
      answer_time: number,
      justification: string,
      justification_time: number
    }
}
