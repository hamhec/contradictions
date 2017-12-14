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
          'answer_time' => 300000,
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

      // if we did not store the starting time then default to max
      if($start_time === false) $start_time = $answer_time - 300000;

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

        $points += 240 - ($answer->answer_time/1000) + 5;

        $points += strlen($answer->justification) * 10;

        $points = $points / 10;


        $score->points += round($points);
        $score->answered_questions += 1;
        $score->total_time += $answer->answer_time;
        $score->save();

        // Calculate Achievements
        $this->handleAchievements($user, $question, $answer);
      }
      return "all good";
    }

    private function handleAchievements($user, $question, $answer) {

      $this->addAchievement($user, 3);

      // Justification Achievement
      if($answer->justification == "") {
        $this->addAchievement($user, 1);
      } else {
        $this->addAchievement($user, 2);
      }


      if($answer->answer == 1) { // Oui
        $count = Answer::where('question_id', $question->id)->where('user_id', $user->id)->where('answer', 1)->get()->count();
        if($count == 1) {
          $this->addAchievement($user, 4);
        } else if ($count == 3) {
          $this->addAchievement($user, 5);
        } else if ($count == 5) {
          $this->addAchievement($user, 6);
        }
      } else if($answer->answer == -1) { // Oui
        $count = Answer::where('question_id', $question->id)->where('user_id', $user->id)->where('answer', -1)->get()->count();
        if($count == 1) {
          $this->addAchievement($user, 7);
        } else if ($count == 3) {
          $this->addAchievement($user, 8);
        } else if ($count == 5) {
          $this->addAchievement($user, 9);
        }
      } else if($answer->answer == 0) { // Oui
        $count = Answer::where('question_id', $question->id)->where('user_id', $user->id)->where('answer', 0)->get()->count();
        if($count == 1) {
          $this->addAchievement($user, 10);
        } else if ($count == 3) {
          $this->addAchievement($user, 11);
        } else if ($count == 5) {
          $this->addAchievement($user, 12);
        }
      }

      return "good";
    }

    public function addAchievement($user, $achievement_id) {
      $already = $user->achievements->contains(function($key, $value) use ($achievement_id) {
        return $value->id == $achievement_id;
      });
      if(!$already) {
        $user->achievements()->attach($achievement_id);
      }
    }
}
