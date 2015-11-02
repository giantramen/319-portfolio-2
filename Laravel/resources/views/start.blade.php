<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DFG</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <style>
    	#register {
    		margin-right: 8px;
    		width: 100px;
    	}
    	#submit {
    		margin-left: 8px;
    		width: 100px;
    	}
    	.input-group {
    		max-width: 300px;
    		padding: 5px;
    		margin-left: auto;
    		margin-right: auto;
    	}
    	.spinner {
		  width: 143px;
		  height: 143px;
		  position: relative;
		  margin: 20px auto;
		}
		.red {
			margin: auto;
			margin-top: 15px;
			display: none;
			max-width: 300px;
			text-align: center;
		}
		.alert h4 {
			margin: 0px;
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
    <script>
    $(document).ready(function() {
    	$("#submit").click(function() {
    		$(".input-group").hide();
    		$(".spinner").show();
    		var username = $("#user").val();
    		var password = $("#pass").val();
    		var token = $("#token").val();
    		$.post("/login", {_token:token, username:username, password:password}, function(result) {
    			if(result) {
    				$(".input-group").show();
    				$(".spinner").hide();
    				$(".alert").show();
    			}
    		});
    	});

		$("#register").click(function() {
    		$(".input-group").hide();
    		$(".spinner").show();
    		var username = $("#user").val();
    		var password = $("#pass").val();
    		var token = $("#token").val();
    		$.post("/register", {_token:token, username:username, password:password}, function(result) {
    			if(result) {
    				$(".input-group").show();
    				$(".spinner").hide();
    				$(".alert").show();
    			}
    		});
    	});

    	$("input").focus(function() {
    		$(".alert").hide();
    	});
    });
    </script>
  </head>
  <body>
  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-md-1"></div>
  			<div class="col-md-10">
  				<div>
  					<img style="width: 100%; max-width: 500px; margin: auto; display: block; margin-top: 20px;" src="logo.png" />
  				</div>
  			</div>
  			<div class="col-md-1"></div>
  		</div>
  		<div class="row" style="margin-top: 30px;">
  			<div class="col-md-4"></div>
  			<div class="col-md-4">
  				<div>
  					<div class="well" style="padding: 15px 0px 5px 0px; max-width: 380px; margin: auto">
		  				<div class="input-group input-group-lg">
						  <span class="input-group-addon" id="basic-addon1">></span>
						  <input id="user" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
						</div>
						<div class="input-group input-group-lg">
						  <span class="input-group-addon" id="basic-addon1">></span>
						  <input id="pass" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
						</div>
						<input type="hidden" id="token" value="{{ csrf_token() }}">
						<p class="input-group" style="padding-top: 10px;">
							<button id="register" type="button" class="btn btn-primary btn-lg">Register</button>
	  						<button id="submit" type="button" class="btn btn-primary btn-lg">Sign In</button>
  							<div class="spinner" style="display: none;">
							  <div class="double-bounce1"></div>
							  <div class="double-bounce2"></div>
							</div>
						</p>
					</div>
					<div class="alert alert-danger alert-dismissible fade in red" role="alert">
				      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				      <h4>Login Failed</h4>
				    </div>
				</div>
  			</div>
  			<div class="col-md-4"></div>
  		</div>
	</div>
  </body>
</html>