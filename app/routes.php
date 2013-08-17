<?php


Cache::forever('title', 'Suba FAQ');

Route::get('/', 'IndexController@index');