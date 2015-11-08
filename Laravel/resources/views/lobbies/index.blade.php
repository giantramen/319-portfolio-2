    <style>
		td, th {
			text-align: center !important;
		}
		input {
			color: black;
		}
    </style>
	
@extends('layout')
 
@section('content')
		<div class="container-fluid">
			<div class="row" style="margin-top: 35px;">
			@if ( count($lobbies) < 1 )
	        	No matches available
	    	@else
	        <div class="col-md-1"></div>
	        <div class="col-md-10">
				<div class="panel panel-primary" style="padding: 0px;">
		        	<div class="panel-heading" style="text-align:center;">Available Matches</div>
	  				<div class="panel-body" style="padding: 0px;">
				        	<table id="maintable" cellpadding="5" cellspacing="0" class="table table-bordered table-hover" style="margin:0px;">
								<tr class="appendrow">
									<th>Match Type</th>
									<th>Start Time</th>
									<th>Entry Fee</th>
									<th>Players</th>
									<th>Join</th>
								</tr>
								<tr id="helperrow" style="display: none;">
								</tr>
								@foreach($lobbies as $lobby)
								@if ($lobby->numberOfPlayers != 2 && $lobby->player1ID != $_SESSION["username"] && $lobby->player2ID != $_SESSION["username"])
										<tr>
											<td>{{$lobby->matchType}}</td>
											<td>{{$lobby->startTime}}</td>
											<td>{{$lobby->entryFee}} mBTC</td>
											<td>{{$lobby->numberOfPlayers}}/2</td>
											<td><a href="{{('/players/' . $lobby->id) }}" ><input type="button" value="Join Match"/></a></td>
										</tr>
								@endif
								@endforeach
							</table>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
    @endif
@endsection

