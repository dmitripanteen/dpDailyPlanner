<?php

use Illuminate\Support\Facades\Route;

//Route::get('/home', function () {
//    return action('App\Http\Controllers\HomeController@index');
//});
//Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'HomeController@index');
