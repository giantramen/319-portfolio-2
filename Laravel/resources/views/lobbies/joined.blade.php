    <style>
		table.db-table { border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
		.table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
		.table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
    </style>
	
@extends('layout')
 
@section('content')
		<div class="container-fluid">
			<h2>Lobbies</h2>
	    	@if ( !$lobbies->count() )
	        	You have no players availible
	    	@else
			<div class="row" style="margin-top: 30px;">
	        <div class="col-md-1"></div>
	        <div class="col-md-5">
	        	<table cellpadding="5" cellspacing="0" class="table table-striped table-bordered table-hover">
					<tr>
						<th>Lobby</th>
						<th>Match Type</th>
						<th>Start Time</th>
						<th>Entry Fee</th>
						<th>Number of Players</th>
						<th>Player 1</th>
						<th>Player 2</th>
						
					</tr>
					
					@foreach($lobbies as $lobby)
					@if ($player1ID == _SESSION["username"] || $player2ID == _SESSION["username"])
							<tr>
								<th>{{$lobby->id}}</th>
								<th>{{$lobby->matchType}}</th>
								<th>${{$lobby->startTime}}</th>
								<th>{{$lobby->entryFee}} mBTC</th>
								<th>{{$lobby->numberOfPlayers}}/2</th>
								<th>{{$lobby->player1ID}}</th>
								<th>{{$lobby->player2ID}}</th>
								<th><input type="button" value="View Lobby" href="{{ URL::to('lobbies/' . $lobby->id . '/show') }}"</th>
							</tr>
					@endif
					@endforeach
				</table>
			</div>
		</div>
    @endif
@endsection

