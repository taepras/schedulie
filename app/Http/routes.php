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

Route::get('/', 'EventsController@index');

Route::get('/process', 'EventsController@processView');

Route::post('timeline/new', 'EventsController@storeTimeline');
Route::post('timeline/delete/{id}', 'EventsController@destroyTimeline');
Route::post('event/new', 'EventsController@storeEvent');
Route::get('event/delete/{id}', 'EventsController@destroyEvent');

Route::get('home', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
