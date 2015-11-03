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
    </style>
	
@extends('layout')
 
@section('content')
		<div class="container-fluid">
			<div class="row" style="margin-top: 30px;">
	        <div class="col-md-1"></div>
	        <div class="col-md-5 scroller">
	        	<table id="maintable" cellpadding="5" cellspacing="0" class="table table-bordered table-hover">
	        		<tr>
						<th>
							<div class="input-group">
							    <div class="input-group">
								  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
								  <input id="search" type="text" class="form-control" placeholder="Players" aria-describedby="basic-addon1">
								</div>
							</div>
						</th>
						<th colspan="2">
							<div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    Sort
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu active-parent" aria-labelledby="dropdownMenu1">
							    <li id="namesort" class="active-sort sortselect"><a class="sortclass">Name</a></li>
							    <li id="costsort" class=" sortselect"><a class="sortclass">Cost</a></li>
							    <li id="pointsort" class=" sortselect"><a class="sortclass">Points</a></li>
							  </ul>
							</div>
						</th>	
						<th>
							<div class="btn-group" role="group" aria-label="...">
							  <button type="button" class="btn btn-default sort-direction button-down"><span class="glyphicon glyphicon-menu-down"></span></button>
							  <button id="up" type="button" class="btn btn-default sort-direction sort-choose button-up"><span class="glyphicon glyphicon-menu-up"></span></button>
							</div>

						</th>
					</tr>
					<tr class="appendrow">
						<th>Player</th>
						<th>Cost</th>
						<th>League Points</th>
						<th>Add/Drop</th>
					</tr>
					<tr id="helperrow" style="display: none;">
					</tr>
					@foreach($players as $player)
						<tr id={{$player->id}} class="hiderows">
							<td class="player">{{$player->name}}</td>
							<td class="cost">${{$player->cost}}</td>
							<td class="points">{{$player->leaguePoints}}</td>
							<td><input type="button" value="Add" class="btn btn-success add-player"/></td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class="col-md-5">
				<div class="panel panel-primary">
					<div class="panel-heading">Your Entry</div>
					  <div class="panel-body">
					    <div class="col-md-4">1/5</div>
					    <div class="col-md-4">$600</div>
					    <div class="col-md-4">2000</div>
					 </div>
				</div>
	        	<table id="entry" cellpadding="5" cellspacing="0" class="table table-bordered table-hover">
					<tr>
						<th>Player</th>
						<th>Cost</th>
						<th>League Points</th>
						<th>Add/Drop</th>
					</tr>
						<tr id="entry-one" class="entry-row">
							<td class="holder"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td class="toggle">
								<span class="dash">-</span>
								<input id="entry-select-one" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
						<tr id="entry-two" class="entry-row">
							<td class="holder"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td>
								<span class="dash">-</span>
								<input id="entry-select-two" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
						<tr id="entry-three" class="entry-row">
							<td class="holder"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td>
								<span class="dash">-</span>
								<input id="entry-select-three" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
						<tr id="entry-four" class="entry-row">
							<td class="holder"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td>
								<span class="dash">-</span>
								<input id="entry-select-four" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
						<tr id="entry-five" class="entry-row">
							<td class="holder"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td>
								<span class="dash">-</span>
								<input id="entry-select-five" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
				</table>
				<p class="input-group" style="padding-top: 5px; margin:auto;">
					<button id="submit" type="button" class="btn btn-primary btn-lg">Submit</button>
				</p>
			</div>
			<div class="col-md-1"></div>
			</div>
		</div>
		<script>
		$(document).ready(function() {
			$(".add-player").click(function() {
				var row = $(this).parent().parent();
				var id = $(row).attr("id");
				var player = $(row).find(".player").text();
				var cost = $(row).find(".cost").text();
				var points = $(row).find(".points").text();
				var placed = false;
				for(var i = 0; i < 5; i++) {
					var selected = $(".entry-row")[i];
					if(!$(selected).hasClass("taken")) {
						if(placed == false) {
							$(row).hide();
							$(selected).addClass("taken");
							$(selected).find(".holder").text(id);
							$(selected).find(".player").text(player);
							$(selected).find(".cost").text(cost);
							$(selected).find(".points").text(points);
							$(selected).find(".dash").hide();
							$(selected).find(".drop-player").show();
							placed = true;
						}
					}
				}	
			});

			$(".drop-player").click(function() {
				var row = $(this).parent().parent();
				var id = $(row).find(".holder").text();
				$("#" + id).show();
				$(row).removeClass("taken");
				$(row).find(".player").text("-");
				$(row).find(".cost").text("-");
				$(row).find(".points").text("-");
				$(row).find(".dash").show();
				$(row).find(".drop-player").hide();
			});

			$(".sort-direction").on("click", function() {
				$(".sort-direction").removeClass("sort-choose");
				$(this).addClass("sort-choose");
				var direction = 0;
				if($(this).hasClass("button-up")) direction = 1;
				var value = 1;
				var id = $(".active-sort").attr("id");
				if(id === "costsort") {
					value = 2;
				} else if(id === "pointsort") {
					value = 3;
				}
				var array = sorter($(".hiderows"), direction, value);
				appendIt(array, direction);
			});

			$(".sortselect").on("click", function() {
				var id = $(this).attr("id");
				console.log(id);
				var value = 1;
				$(".active-sort").removeClass("active-sort");
				if(id === "costsort") {
					value = 2;
					$("#costsort").addClass("active-sort");
				} else if(id === "pointsort") {
					value = 3;
					$("#pointsort").addClass("active-sort");
				} else {
					$("#namesort").addClass("active-sort");
				}
				if($("#up").hasClass(".sort-choose")) {
					var array = sorter($(".hiderows"), 1, value);
					appendIt(array, 1);
				} else {
					var array = sorter($(".hiderows"), 0, value);
					appendIt(array, 0);
				}
			});

			$("#search").on("keyup", function() {
			    var value = $(this).val();
			    $(".hiderows").each(function(index) {
		            $row = $(this);
		            var id = $(this).find(".player").text().toLowerCase();
		            if(id.indexOf(value.toLowerCase()) != 0) {
		                $(this).hide();
		            }
		            else {
		                $(this).show();
		            }
			    });
			});

			function sorter(array, direction, value) {
				array.sort(function(a, b) {
					if(value == 1) {
						var namea = $(a).find(".player").text();
    					var nameb = $(b).find(".player").text();
    					a = namea.toUpperCase();
    					b = nameb.toUpperCase();
					} else if(value == 2) {
						var moneya = $(a).find(".cost").text();
    					var moneyb = $(b).find(".cost").text();
    					a = parseInt(moneya.substring(1, moneya.length));
    					b = parseInt(moneyb.substring(1, moneyb.length));
					} else {
						var pointsa = $(a).find(".points").text();
    					var pointsb = $(b).find(".points").text();
    					a = parseInt(pointsa);
    					b = parseInt(pointsb);
					}
					if(a > b) {
				        return -1;
				    } else if(a < b) {
				        return 1;
				    } else {
				        return 0;
				    }
				});
				return array;
			}

			function appendIt(array, direction) {
				if(direction == 0) {
					var i = array.length;
					var second = [];
					while (i--) {
						second.push(array[i]);
					}
					$("#maintable").append(second);
				} else {
					$("#maintable").append(array);
				}
			}

		});
		</script>
@endsection