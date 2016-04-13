module Expdiag {
    "use strict";
    export interface IUserAccount {
      sexe: boolean;
      age: number;
    }

    export interface IWorld {
      id: number,
      world: string,
      question1: string,
      right_answer1: number,
      explanation: string,
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
      justification_time: number,
      evaluation: number
    }
}
