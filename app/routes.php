<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'signed'), function () {
    
    Route::get('/hello', function() {
        return View::make('hello');
    });

    Route::get('/', function() {
        return View::make('hello');
    });

    Route::get('project/create', 'ProjectController@create');
    Route::get('logout', 'UserController@logout');
});



Route::get('login', 'UserController@loginView');
Route::get('login/check', 'UserController@login');
Route::get('user/create', 'UserController@create');
