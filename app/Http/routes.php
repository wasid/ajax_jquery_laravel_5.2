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
    return view('welcome');
});

Route::get('/posts', 'PostController@index');

Route::post('ajaxpost', 'PostController@store');

Route::post('ajaxshow', 'PostController@show');

Route::post('ajaxedit', 'PostController@edit');

Route::post('ajaxupdate', 'PostController@update');

Route::post('ajaxdelete', 'PostController@delete');

