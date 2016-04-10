<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;
use App\Question;
use App\Achievement;

class User extends Authenticatable
{
    const EXPLANATION_CLASSIC = 0;
    const EXPLANATION_DIALOG = 1;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'age', 'gender', 'explanation_type', 'created_at', 'updated_at'
    ];

    public function answers() {
      return $this->hasMany('App\Answer');
    }

    public function score() {
      return $this->hasOne('App\Score');
    }
    public function achievements() {
      return $this->belongsToMany('App\Achievement', 'user_achievement');
    }

    public function getInfos() {
      $infos = new \stdClass;
      $infos->id = $this->id;
      $infos->name = $this->name;
      $infos->score = $this->score;
      $infos->remaining = Question::unanswered($this->id)->count();
      $infos->total_questions = Question::all()->count();

      $infos->achievements = $this->achievements;
      return $infos;
    }

    static public function getLoggedUser() {
      $id = Session::get('user', false);
      return ($id == true) ? User::findOrFail($id) : false;
    }

    static public function getExplanationType() {
      $nbr_users = User::all()->count();
      $nbr_classic = User::where('explanation_type', User::EXPLANATION_CLASSIC)->count();

      return ($nbr_classic < ($nbr_users/2)) ? User::EXPLANATION_CLASSIC : User::EXPLANATION_DIALOG;
    }
}
