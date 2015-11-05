    <style>
		table.db-table { border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
		.table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
		.table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
    </style>
	
@extends('layout')
 
@section('content')
		<div class="container-fluid">
			<h2>Lobbies</h2>
	    	@if ( count($lobbies) < 1 )
	        	No games available
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
						<th>Join</th>		
					</tr>
					
					@foreach($lobbies as $lobby)
					@if ($lobby->numberOfPlayers != 2)
							<tr>
								<th>{{$lobby->id}}</th>
								<th>{{$lobby->matchType}}</th>
								<th>${{$lobby->startTime}}</th>
								<th>{{$lobby->entryFee}} mBTC</th>
								<th>{{$lobby->numberOfPlayers}}/2</th>
								<th><a href="{{('/players/' . $lobby->id) }}" ><input type="button" value="Join Lobby"/></a></th>
							</tr>
					@endif
					@endforeach
				</table>
			</div>
		</div>
    @endif
@endsection

