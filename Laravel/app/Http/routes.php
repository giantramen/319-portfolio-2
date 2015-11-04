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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

Route::model('players', 'Player');


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

Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::resource('players', 'PlayersController');
Route::resource('lobbies', 'LobbiesController');


Route::post('/login', function() {
	$username = Input::get('username');
	$password = Input::get('password');
	$exists = DB::table('users')->where('username', $username)->where('password', $password)->get();
	if(is_null($exists)) {
		sleep(1);
    	echo 1;
	} else {
		session_start();
		$_SESSION["userID"] = $username;
		Redirect::to('lobbies');
	}
});

Route::post('/register', function() {
	$username = Input::get('username');
	$password = Input::get('password');
	$exists = DB::table('users')->where('username', $username)->first();
	if(is_null($exists)) {
		DB::table('users')->insert(['username' => $username, 'password' => $password]);
		session_start();
		$_SESSION["username"] = $username;
		return Redirect::route('/lobbies');
	} else {
		sleep(1);
    	echo 1;
	}
});

Route::post('/entry', function() {
	$players = Input::get('players');
	$error = false; $sum = 0;
	foreach ($players as $player) {
		$exists = DB::table('players')->where('id', $player)->value('cost');
		if(is_null($exists)) {
			$error = true;
		} else {
			$sum += $exists;
		}
	}
	if($sum > 5000) $error = true;
	if($error) {
		sleep(1);
    	echo 2;
	} else {
		sleep(1);
    	echo 1;
	}
});

