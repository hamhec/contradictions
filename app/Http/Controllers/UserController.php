<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\User;
use App\Score;
use Response;

class UserController extends Controller {
    public function create(Request $request) {
      $user = User::getLoggedUser();
      if($user != false) {
        return $user;
      }

      $input = $request->all();

      $user = new User($input);
      // Set user's unique id
      $user->name = uniqid();

      $user->save();

      Score::create(['points' => 0,
      'answered_questions' => 0,
      'total_time' => 0,
      'user_id' => $user->id]);

      Session::put('user', $user->id);

      return $user->id;
    }

    public function logout() {
      Session::forget('user');
      Session::forget('question_id');
      return "Logged out";
    }

    public function loggedUser() {
      $user = User::getLoggedUser();
      if($user == false) {
        return null;
      }
      return Response::json(array('user_id' => $user->id, 'infos' => $user->getInfos()));
    }
}
