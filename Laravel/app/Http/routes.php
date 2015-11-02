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
Route::model('players', 'Player');
Route::model('lobbies', 'Lobby');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/start', function() {
    return view('start');
});

Route::get('/lobbies', function() {
    return view('lobbies');
});

Route::bind('players', function($value, $route) {
	return App\Players::whereSlug($value)->first();
});


Route::post('/login', function() {
	$username = Input::get('username');
	$password = Input::get('password');
	$exists = DB::table('users')->where('username', $username)->where('password', $password)->first();
	if(is_null($exists)) {
		sleep(1);
    	echo 1;
	} else {
		//session_start();
		//$_SESSION["userID"] = $exists->ID;
		return view('lobbies');
	}
});

Route::post('/register', function() {
	$username = Input::get('username');
	$password = Input::get('password');
	$exists = DB::table('users')->where('username', $username)->first();
	if(is_null($exists)) {
		DB::table('users')->insert(['username' => $username, 'password' => $password]);
		session_start();
		$_SESSION["userID"] = $exists->ID;
		return Redirect::route('/lobbies');
	} else {
		sleep(1);
    	echo 1;
	}
});

Route::resource('players', 'PlayersController');
Route::resource('lobbies', 'LobbiesController');

