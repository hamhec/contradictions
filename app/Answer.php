<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $table = 'answers';

  protected $fillable = [
    'answer',
    'justification',
    'answer_time',
    'evaluation',
    'justification_time',
    'question_id',
    'user_id',
    'created_at',
    'updated_at'
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function question() {
    return $this->belongsTo('App\Question');
  }
}
