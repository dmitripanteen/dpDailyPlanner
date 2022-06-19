<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    $user = Auth::user();
    if(!$user || !$user->id) {
        return view('main');
    }
    return view('home');
});
//tasks routes
include __DIR__ . '/sub/tasks.php';
//category routes
include __DIR__ . '/sub/categories.php';

