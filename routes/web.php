<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('main');
});
//tasks routes
include __DIR__ . '/sub/tasks.php';

