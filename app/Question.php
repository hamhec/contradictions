<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Question extends Model
{
    protected $table = "questions";
    public $timestamps = false;

    protected $fillable = ['situation', 'question'];

    public function answers() {
      return $this->hasMany('App\Answer');
    }

    public function scopeUnanswered($query, $user_id) {
      return $query->whereNotExists(function($query) use ($user_id) {
        $query->select(DB::raw(1))
              ->from('answers')
              ->where('user_id', $user_id)
              ->whereRaw('question_id = questions.id');
      });
    }

    public function getQuestion() {
      return array('id' => $this->id, 'question'=> $this->question);
    }
}
