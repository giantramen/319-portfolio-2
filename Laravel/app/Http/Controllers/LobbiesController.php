<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Lobbies;

class LobbiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lobbies = Lobbies::all();
        return view('lobbies.index', compact('lobbies'));
    }
	
	public function join(int $lobby)
	{
		
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view ('lobbies.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$lobby = Lobbies::find($id);
		$player1_players = array(
					$player1 = lobby->player1_1,
					$player2 = lobby->player1_2,
					$player3 = lobby->player1_3,
					$player4 = lobby->player1_4,
					$player5 = lobby->player1_5,
		);
		
		$player2_players = array(
					$player1 = lobby->player2_1,
					$player2 = lobby->player2_2,
					$player3 = lobby->player2_3,
					$player4 = lobby->player2_4,
					$player5 = lobby->player2_5,
		);
					
        return view('lobbies.results', compact('player1_players'), compact('player2_players'), compact('lobby'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$lobby = Lobbies::find($id);
		
		if ($lobby->numberOfPlayers == 0){
			$lobby->player1 = $_SESSION["userID"];
			$lobby->numberOfPlayers = 1;
		}
		else{
			$lobby->player2 = $_SESSION["userID"];
			$lobby->numberOfPlayers = 2;
		}
		$lobby->save();

		// redirect
		return Redirect::to('players');
	}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
