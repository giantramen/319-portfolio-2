    <style>
		table.db-table { border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
		.table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
		.table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
    </style>
	
@extends('layout')
 
@section('content')
		<div class="container-fluid">
			<h2>Players</h2>
	    	@if ( !$players->count() )
	        	You have no players availible
	    	@else
				You have ${{$moneyAvailible}} left
			<div class="row" style="margin-top: 30px;">
	        <div class="col-md-1"></div>
	        <div class="col-md-5">
	        	<table cellpadding="5" cellspacing="0" class="table table-striped table-bordered table-hover">
					<tr>
						<th>Player</th>
						<th>Cost</th>
						<th>League Points</th>
					</tr>
					@foreach($players as $player)
							<tr>
								<th>{{$player->name}}</th>
								<th>${{$player->cost}}</th>
								<th>{{$player->leaguePoints}}</th>
								<th><input id="addPlayer" type="button" value="Add Player"/></th>
							</tr>
					@endforeach
				</table>
			</div>
			<div class="col-md-5">
	        	<table cellpadding="5" cellspacing="0" class="table table-striped table-bordered table-hover">
					<tr>
						<th>Player</th>
						<th>Cost</th>
						<th>League Points</th>
					</tr>
					@foreach($players as $player)
							<tr>
								<th>{{$player->name}}</th>
								<th>${{$player->cost}}</th>
								<th>{{$player->leaguePoints}}</th>
								<th><input id="addPlayer" type="button" value="Add Player"/></th>
							</tr>
					@endforeach
				</table>
			</div>
			<div class="col-md-1"></div>
			</div>
		</div>
    @endif
@endsection