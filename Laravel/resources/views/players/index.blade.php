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
	        		<tr>
						<th>
							<div class="input-group" style="margin:auto;">
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
			<div class="col-md-6 right">
						<div class="col-md-8" style="padding-left:0px;">
							<div class="panel panel-primary" style="text-align:center;">
								<div class="panel-heading" style="color: white;">Match Details</div>
								  <div class="panel-body" style="padding:5px;">
									  <div class="col-md-4" style="padding:2px;padding-top:0px;">
									  Type</br><span class="badge">Open</span>
									  </div>
									  <div class="col-md-4" style="padding:2px;padding-top:0px;">
									  	Entries</br><span class="badge">14</span>
									  </div>
									  <div class="col-md-4" style="padding:2px;padding-top:0px;">
									  	Deadline</br><span class="badge">12/11/15</span>
									  </div>
								 </div>
							</div>
						</div>
						<div class="col-md-4" style="padding-right:0px;">
							<div class="panel panel-default green moneyPanel" style="text-align:center;">
								<div class="panel-heading" style="color: white;">Money</div>
								  <div class="panel-body">
								  	<span class="negative">-</span>$<span class="money">5000</span>
								 </div>
							</div>
						</div>
	        	<table id="entry" cellpadding="5" cellspacing="0" class="table table-bordered table-hover">
					<tr>
						<th style="min-width: 160px;">Player</th>
						<th>Cost</th>
						<th>League Points</th>
						<th>Add/Drop</th>
					</tr>
						<tr id="entry-one" class="entry-row">
							<td class="holder entry-height"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td class="toggle">
								<span class="dash">-</span>
								<input id="entry-select-one" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
						<tr id="entry-two" class="entry-row">
							<td class="holder entry-height"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td>
								<span class="dash">-</span>
								<input id="entry-select-two" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
						<tr id="entry-three" class="entry-row">
							<td class="holder entry-height"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td>
								<span class="dash">-</span>
								<input id="entry-select-three" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
						<tr id="entry-four" class="entry-row">
							<td class="holder entry-height"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td>
								<span class="dash">-</span>
								<input id="entry-select-four" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
						<tr id="entry-five" class="entry-row">
							<td class="holder entry-height"></td>
							<td class="player">-</td>
							<td class="cost">-</td>
							<td class="points">-</td>
							<td>
								<span class="dash">-</span>
								<input id="entry-select-five" type="button" value="Drop" class="btn btn-danger drop-player" style="display: none;"/>
							</td>
						</tr>
				</table>
				<p class="input-group" style="padding-top: 5px; margin:auto; margin-bottom: 20px;">
					<button id="submit" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#submitModal">Submit</button>
				</p>
			</div>
			
			</div>
			<div id="submitModal" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="gridSystemModalLabel" style="text-align:center;">Submit Entry</h4>
			      </div>
			      <div class="modal-body">
			        <div class="row">
			          	<div class="col-md-12">
			          		<div class="alert alert-danger alert-players alert-hide" role="alert" style="text-align:center;display:none;margin-bottom:4px;">Error: Not All Player Slots Are Filled</div>
							<div class="alert alert-danger alert-money alert-hide" role="alert" style="text-align:center;display:none;margin-bottom:4px;">Error: Maximum Salary Exceeded</div>
							<div class="alert alert-info alert-normal alert-hide" role="alert" style="text-align:center;margin-bottom:4px;display:none;">All Submissions Are Final</div>
							<div class="alert alert-success submission-success alert-hide" role="alert" style="text-align:center;margin-bottom:4px;display:none;">Successful Submission</div>
							<div class="alert alert-danger alert-fail alert-hide" role="alert" style="text-align:center;margin-bottom:4px;display:none;">Error: Submission Failure, Please Try Again</div>
							<div class="spinner alert-hide">
							  <div class="double-bounce1"></div>
							  <div class="double-bounce2"></div>
							</div>
						</div>
			        </div>
			      </div>
			      <div class="modal-footer" style="text-align: center;">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			        <button type="button" class="btn btn-success final-submit">Submit</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
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
							countMoney();
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
				countMoney();
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
				if($("#up").hasClass("sort-choose")) {
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

			$("#submit").click(function() {
				$(".final-submit").addClass("disabled");
				$(".alert-hide").hide();
				var check1 = checkPlayers();
				var check2 = checkMoney();
				console.log(check1, check2);
				if(check1 == true && check2 == true) {
					$(".alert-normal").show();
					$(".final-submit").removeClass("disabled");
				} else {
					$(".alert-hide").hide();
					if(!check1) $(".alert-players").show();
					if(!check2) $(".alert-money").show();
				}
			});

			$(".final-submit").click(function() {
				var check1 = checkPlayers();
				var check2 = checkMoney();
				if(check1 == true && check2 == true) {
					$(".alert-hide").hide();
					$(".spinner").show();
					var token = $("#token").val();
					$.post("/entry", {_token:token, match:match}, function(result) {
		    			if(result == 1) {
		    				$(".alert-hide").hide();
		    				$(".submit-success").show();
		    			} else if(result == 2) {
		    				$(".alert-hide").hide();
		    				$(".alert-fail").show();
		    			}
		    		});
					$(".submit-success").show();
					$(".alert-error").show();
				} else {
					$(".alert-hide").hide();
					if(!check1) $(".alert-players").show();
					if(!check2) $(".alert-money").show();
				}
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

			function countMoney() {
				var total = 5000;
				var sum = 0;
				for(var i = 0; i < 5; i++) {
					var selected = $(".entry-row")[i];
					if($(selected).hasClass("taken")) {
						sum += parseInt($(selected).find(".cost").text().replace("$",""));
					}
				}
				var newTotal = total - sum;
				if(newTotal < 0) {
					$(".moneyPanel").removeClass("green").addClass("red");
					$(".negative").show();
				} else {
					$(".moneyPanel").addClass("green").removeClass("red");
					$(".negative").hide();
				}
				$(".money").text(Math.abs(newTotal));
			}

			function checkMoney() {
				if($(".negative").is(":visible")) return false;
				return true;
			}

			function checkPlayers() {
				if($(".taken").length == 5) return true
				return false;
			}

		});
		</script>
@endsection