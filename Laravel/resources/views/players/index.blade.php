    <style>
		table.db-table { border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
		.table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
		.table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
    </style>
	
@extends('app')
 
@section('content')
    <h2>Players</h2>
    @if ( !$players->count() )
        You have no players availible
    @else
		You have ${{$moneyAvailible}} left
		
        <table cellpadding="5" cellspacing="0" class="db-table">
		<tr><th>Player</th><th>Cost    </th><th>League Points</th></tr>
		@foreach($players as $player)
				<tr><th>{{$player->name}}</th><th>${{$player->cost}}</th><th>{{$player->leaguePoints}}</th><th><input id="addPlayer" type="button" value="Add Player"/><br /> <br/> </tr>
		@endforeach
		</table><br />
		 
    @endif
@endsection