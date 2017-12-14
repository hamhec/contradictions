<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('master');
});


Route::group(['prefix'=>'/api'],function(){
  Route::post('/login','UserController@create');
  //Route::post('/logout','UserController@logout');
  Route::get('/logout','UserController@logout');
  Route::post('/user','UserController@loggedUser');

  Route::post('/questions/next','QuestionController@nextQuestion');
  Route::post('/questions/question','QuestionController@question');
  Route::post('/questions/answer','QuestionController@answer');
});
