 <style>
	    .scroller {
			height: 600px;
  			overflow-y: scroll;
  			margin-bottom: 20px; 
	    }
		td, th {
			text-align: center !important;
		}
		.holder {
			display: none;
		}
		.dropdown-menu {
			margin-top: 6px !important;
			left: 10 !important;
			text-align: center !important;
		}
		.table>tbody>tr>td {
			vertical-align: middle !important;
			padding: 6px !important;
		}
		.dim {
			opacity: 60%;
		}
		.sortclass {
			cursor: pointer;
		}
		.entry-height {
			min-height: 47px;
			height: 47px;
		}
		.entry-row {
			min-height: 47px;
			height: 47px;
		}
		.left {
			padding-left: 10px;
		}
		.right {
			padding-right: 10px;
		}
		.green > .panel-heading {
			background-color: #55B64F !important;
			border-color: #5EB84C !important;
		}
		.red > .panel-heading {
			background-color: #D9544B !important;
			border-color: #D9544B !important;
		}
		.negative {
			display: none;
		}
		.spinner {
		  width: 143px;
		  height: 143px;
		  position: relative;
		  margin: 20px auto;
		}
		.double-bounce1, .double-bounce2 {
		  width: 100%;
		  height: 100%;
		  border-radius: 50%;
		  background-color: #3279BC;
		  opacity: 0.6;
		  position: absolute;
		  top: 0;
		  left: 0;
		  
		  -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
		  animation: sk-bounce 2.0s infinite ease-in-out;
		}
		.double-bounce2 {
		  -webkit-animation-delay: -1.0s;
		  animation-delay: -1.0s;
		}

		@-webkit-keyframes sk-bounce {
		  0%, 100% { -webkit-transform: scale(0.0) }
		  50% { -webkit-transform: scale(1.0) }
		}

		@keyframes sk-bounce {
		  0%, 100% { 
		    transform: scale(0.0);
		    -webkit-transform: scale(0.0);
		  } 50% { 
		    transform: scale(1.0);
		    -webkit-transform: scale(1.0);
		  }
		}
    </style>
	
@extends('layout')
 
@section('content')
		<div class="container-fluid">
			<div class="row" style="margin-top: 30px;">
	        <input type="hidden" id="token" value="{{ csrf_token() }}">
	        <div class="col-md-6 scroller left">
	        	<table id="maintable" cellpadding="5" cellspacing="0" class="table table-bordered table-hover">
					<tr class="appendrow">
						<th>Player</th>
						<th>Cost</th>
						<th>League Points</th>
					</tr>
					<tr id="helperrow" style="display: none;">
					</tr>
					@foreach($player1_players as $player)
						<tr id={{$player->id}} class="hiderows">
							<td class="player">{{$player->name}}</td>
							<td class="cost">${{$player->cost}}</td>
							<td class="points">{{$player->leaguePoints}}</td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class="col-md-6 right">
						<div class="col-md-8" style="padding-left:0px;">
							<div class="panel panel-primary" style="text-align:center;">
								<div class="panel-heading" style="color: white;">Match Details</div>
								  <div class="panel-body" style="padding:5px;">
									  <div class="col-md-4" style="padding:2px;padding-top:0px;">
									  Type</br><span class="badge">$lobby->type</span>
									  </div>
									  <div class="col-md-4" style="padding:2px;padding-top:0px;">
									  	Entries</br><span class="badge">$lobby->numberOfPlayers</span>
									  </div>
									  <div class="col-md-4" style="padding:2px;padding-top:0px;">
									  	Deadline</br><span class="badge">$lobby->startTime</span>
									  </div>
								 </div>
							</div>
						</div>
	        	<table id="entry" cellpadding="5" cellspacing="0" class="table table-bordered table-hover">
					<tr class="appendrow">
						<th>Player</th>
						<th>Cost</th>
						<th>League Points</th>
					</tr>
					<tr id="helperrow" style="display: none;">
					</tr>
					@foreach($player2_players as $player)
						<tr id={{$player->id}} class="hiderows">
							<td class="player">{{$player->name}}</td>
							<td class="cost">${{$player->cost}}</td>
							<td class="points">{{$player->leaguePoints}}</td>
						</tr>
					@endforeach
				</table>
				<p class="input-group" style="padding-top: 5px; margin:auto; margin-bottom: 20px;">
					<button id="submit" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#submitModal">Submit</button>
				</p>
			</div>
			
			</div>
		</div>
	