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
use App\Players;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('start');
});

Route::get('/start', function() {
	session_start();
	if(isset($_SESSION["username"])) return Redirect::to('/lobbies');
    return view('start');
});

Route::get('/lobbies', function() {
	session_start();
	if(!isset($_SESSION["username"])) return Redirect::to('/start');
	$lobbies = DB::table('lobbies')->get();
    return view('lobbies.index', compact('lobbies'));
});

Route::get('/players/{id}', function($id) {
	session_start();
	if(!isset($_SESSION["username"])) return Redirect::to('/start');
	if(!isset($id)) return Redirect::to('/lobbies');
	$lobbies = DB::table('lobbies')->where('id', $id)->first();
	$players = DB::table('players')->get();
	$data['id'] = $id;
	return view('players.index', compact('lobbies'), compact('players'));
});

Route::get('/joined', function() {
	session_start();
	if(!isset($_SESSION["username"])) return Redirect::to('/start');
	$l1 = DB::table('lobbies')->where('player1ID', $_SESSION["username"])->get();
	$l2 = DB::table('lobbies')->where('player2ID', $_SESSION["username"])->get();
	$lobbies = array_merge($l1, $l2);
    return view('lobbies.joined', compact('lobbies'));
});

Route::post('/login', function() {
	session_start();
	$username = Input::get('username');
	$password = Input::get('password');
	$exists = DB::table('allusers')->where('id', $username)->where('id', $password)->first();
	if(is_null($exists)) {
		sleep(1);
    	echo 1;
	} else {
		$_SESSION["username"] = $username;
		echo 2;
	}
});

Route::post('/register', function() {
	session_start();
	$username = Input::get('username');
	$password = Input::get('password');
	$exists = DB::table('allusers')->where('username', $username)->first();
	if(is_null($exists)) {
		DB::table('allusers')->insert(['username' => $username, 'password' => $password]);
		$_SESSION["username"] = $username;
		echo 2;
	} else {
		sleep(1);
    	echo 1;
	}
});

Route::post('/entry', function() {
	session_start();
	$players = Input::get('players');
	$id = Input::get('id');
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
		$nexterror = false;
		$lobby = DB::table('lobbies')->where('id', $id)->first();
		if(!is_null($lobby)) {
			if($lobby->numberOfPlayers > 1) {
				$nexterror = true;
			} else {
				$playerString = "player1";
				if($lobby->player1ID > 0) $playerString = "player2";
				$query = DB::table('lobbies')->where('id', $id)->update(['numberOfPlayers' => $lobby->numberOfPlayers + 1,
																$playerString.'ID' => $_SESSION["username"],
																$playerString.'_1' => $players[0],
																$playerString.'_2' => $players[1],
																$playerString.'_3' => $players[2],
																$playerString.'_4' => $players[3],
																$playerString.'_5' => $players[4]]);
			}
		} else {
			$nexterror = true;
		}
		if($nexterror) {
			echo 2;
		} else {
			echo 1;
		}
    }

});

Route::get('/logout', function() {
	session_start();
	session_destroy();
	return Redirect::to('/start');
});
