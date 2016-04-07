<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;

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

    public function score() {
      return $this->hasOne('App\Score');
    }

    public function achievements() {
      return $this->hasMany('App\Achievements');
    }

    public function getTotalTime() {
      return $this->score->time;
    }

    public function getAchievements() {
      return $this->achievements->count();
    }
    public function getScore() {
      return $this->score->points;
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
