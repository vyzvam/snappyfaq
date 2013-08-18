<?php


Cache::forever('title', 'Suba Q&A');

Route::get('/', 'IndexController@index');

Route::get('login', array('as' => 'users.login', 'uses' => 'UsersController@login'));
Route::post('login_attempt', array('as' => 'users.login_attempt', 'uses' => 'UsersController@loginAttempt'));

Route::resource('users', 'UsersController');
