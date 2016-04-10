<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use Response;
use Session;
use App\User;
use App\Answer;
use App\Score;

class QuestionController extends Controller {

    public function nextQuestion() {
      $user = User::getLoggedUser();
      if($user == false) { return null;}

      // If there was an unanswered question
      if(Session::has('question_id')) {
        $question = Question::findOrFail(Session::pull('question_id'));
        if(Answer::where('question_id', $question->id)->where('user_id', $user->id)->get()->count() == 0) {
          $answer = Answer::create(['answer' => 1,
          'answer_time' => 200000,
          'justification_time' => 0,
          'question_id' => $question->id,
          'user_id' => $user->id]);

          $score = $user->score;
          $score->answered_questions += 1;
          $score->total_time += $answer->answer_time;
          $score->save();

          $this->handleAchievements($user, $question, $answer);
        }
      }

      $questions = Question::unanswered($user->id)->get();

      // If he answered all questions
      if($questions->count() == 0) {
        return Response::json(array('finished' => true));
      }

      $question = $questions[rand(0, $questions->count() - 1)];

      // set Question num
      $question->num = Question::all()->count() - $question->count() + 1;

      // hide informations
      $question->question2 = null;
      $question->right_answer2 = null;
      if($user->explanation_type == User::EXPLANATION_CLASSIC) {
        $question->explanation = $question->exp_classic;
      } else {
        $question->explanation = $question->exp_dialog;
      }

      $question->exp_dialog = null;
      $question->exp_classic = null;

      return $question;
    }

    public function question(Request $request) {
      $question_id = $request->all()['id'];

      $question = Question::findOrFail($question_id);
      // start the timer
      $start_time = round(microtime(true)*1000);
      Session::put('start_time', $start_time);
      // save question id
      Session::put('question_id', $question->id);

      return $question->getQuestion();
    }

    public function answer(Request $request) {
      // get server time in milliseconds
      $answer_time = round(microtime(true)*1000);
      $start_time = Session::get('start_time', false);

      if($start_time === false) return "no start_time";

      // Make sure the user is legit
      $user = User::getLoggedUser();
      if($user == false) { return null;}

      $inputs = $request->all();
      $inputs['user_id'] = $user->id;

      //$inputs['answer_time'] = $answer_time - $start_time;

      // Make sure we are answering the wright question
      $question_id = Session::pull('question_id', false);
      if(!$question_id || $question_id != $inputs['question_id']) return "no or wrong question";

      $question = Question::findOrFail($question_id);

      if(Answer::where('question_id', $question->id)->where('user_id', $user->id)->get()->count() == 0) {
        $answer = Answer::create($inputs);

        // Calculate the score
        $score = $user->score;
        $points = 10;
        if($question->right_answer2 == $answer->answer) {
          $points += 120 - ($answer->answer_time/1000) + 5;
        }
        $score->points += $points;
        $score->answered_questions += 1;
        $score->total_time += $answer->answer_time;
        $score->save();

        // Calculate Achievements
        $this->handleAchievements($user, $question, $answer);
      }
      return "all good";
    }

    private function handleAchievements($user, $question, $answer) {
      // Justification Achievement
      if($answer->justification == "") {
        $already = $user->achievements->contains(function($key, $value) {
          return $value->id == 16;
        });
        if(!$already) {
          $user->achievements()->attach(16);
        }
      } else {
        $already = $user->achievements->contains(function($key, $value) {
          return $value->id == 15;
        });
        if(!$already) {
          $user->achievements()->attach(15);
        }
      }
      // Question Achievement
      $achievement_id = (($question->id - 1) * 2) + $answer->answer + 1;
      $user->achievements()->attach($achievement_id);

      return "good";
    }
}
