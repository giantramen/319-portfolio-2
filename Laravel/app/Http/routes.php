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

Route::get('/start', function() {
    return view('start');
});

Route::post('/login', function() {
	$username = Input::get('username');
	$password = Input::get('password');
	$exists = true;
	//check for username/password
	if($exists) {
		//start session or whatever
		//return Redirect::route('/');
	} 
	sleep(3);
    echo 1;
});

Route::post('/register', function() {
	$username = Input::get('username');
	$password = Input::get('password');
	$exists = true;
	//check for username/password
	if($exists) {
		//start session or whatever
		//return Redirect::route('/');
	} 
	sleep(3);
    echo 1;
});

Route::resource('players', 'PlayersController');
