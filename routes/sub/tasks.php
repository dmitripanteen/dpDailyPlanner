<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'HomeController@index');

Route::resource('/tasks', 'TasksController');
Route::get('/tasks-all', 'TasksController@index_all');
Route::get('/tasks-complete', 'TasksController@index_complete');
Route::get('/tasks-incomplete', 'TasksController@index_incomplete');
