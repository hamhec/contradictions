<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\User;

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
      // Define which explanation he will get
      $user->explanation_type =
      User::getExplanationType();

      $user->save();
      Session::put('user', $user->id);

      return $user;
    }

    public function logout() {
      Session::forget('user');
      return "Logged out";
    }
}
