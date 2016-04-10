<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
  protected $table = 'achievements';

  protected $fillable = [
    'title',
    'description',
    'icon',
    'created_at',
    'updated_at'
  ];

  public function users() {
    return $this->belongsToMany('App\User', 'user_achievement');
  }
}
