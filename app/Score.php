<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';

    protected $fillable = [
      'points',
      'answered_questions',
      'total_time',
      'user_id',
      'created_at',
      'updated_at'
    ];

    public function user() {
      return $this->belongsTo('App\User');
    }

}
