<?php


Cache::forever('title', 'Suba Q&A');

Route::get('/', array('as' => 'index', 'uses' => 'IndexController@index') );

Route::resource('users', 'UsersController');
Route::get('login', array('as' => 'users.login', 'uses' => 'UsersController@login'));
Route::post('login_attempt', array('as' => 'users.login_attempt', 'uses' => 'UsersController@loginAttempt'));
Route::get('logout', array('as' => 'users.logout', 'uses' => 'UsersController@logout'));



Route::resource('questions', 'QuestionsController');
Route::post('search', array('as' => 'questions.search', 'uses' => 'QuestionsController@search'));

Route::resource('answers', 'AnswersController');