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

/**
* Put all the routes into a group 'api/v1'
*
* @since 2014-03-24
* @version 1.0
**/
Route::group(
	array(
		'prefix' 	=> 'api/v1',
		'before' 	=> '', // filter used before calling routes
		'after' 	=> '', // filter used after calling routes
		),

	function() {

		Route::get('/', function()
		{
			return Response::json(
				array(
					'code' 		=> '200',
					'message' 	=> 'Welcome to API Version 01',
					'data' 		=> '',
					));
		});

		/**
		* Routes to access the actors
		**/
		Route::resource('actors', 'ActorsController');

		/**
		* Routes to access the firms
		**/
		Route::resource('firms', 'FirmsController');

		/**
		* Routes to access the contents
		**/
		Route::resource('contents', 'ContentsController');

	});

/**
* Redirect all the routes to 'api/v1'
*
* @since 2014-03-05
* @version 1.0
**/
Route::any('{all}', function($path) {
	if (!preg_match("/\bapi\/v1\b/i", $path)) {
		return Redirect::intended('api/v1/'.$path);
	}
})->where('all', '.*');