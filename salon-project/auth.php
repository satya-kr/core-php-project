<?php

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Dashboard | Home </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--meta name="google-site-verification" content="NMNyVxnKqYfv7TKLWjNGZ0GnhOHTlNHPaCwtIuOtRr4" /-->
		<!-- bootstrap links -->
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">	
		
		
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery-1.11.3.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<link rel="shortcut icon" type="image/ico" href="img/fav.ico" />
	<link type="text/css" rel="stylesheet" href="./css/custom.css" />
	<script src="./js/custom.js" type="text/javascript"></script>
	
</head>
<body style="background-color:#ddd !important;">
<?php include_once("./inc/navbar.php"); ?>
	<br><br><br>
<div class="container-fluid new-container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 ">
			<!--div class="panel panel-default">
				<div class="panel body"-->
			<input type="checkbox" name="flipper__checkbox" id="flipper__checkbox" class="flipper__checkbox" hidden />
			  <div class="form__container">
				<!-- Front side -->
				<div class="form__login" align="center">
				  <!--h1 class="form__header">Login</h1>
					<hr-->
					<br>
					<!--form class="form-group">
						<span id="ingly" class="glyphicon glyphicon-user" ></span>
						<input type="text" name="username" class="form-control" placeholder="Username">
						<br>
						<input type="password" name="password" class="form-control" placeholder="Password">
						<br><br>
						
					
					</form-->
					<form class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="login-submit" class=" btn btn-default btn-lg login-btn" value="Login">
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
					<small>Not a member yet? <label for="flipper__checkbox" class="txt1">Create your account</label>.</small>

				</div>
				<!-- Back side -->
				<div class="form__signup" align="center">
				  <h1 class="form__header">Sign Up</h1>
				  <hr>
					<form class="form-group">
						<label></label>
						
						<input type="text" name="name" class="form-control" placeholder="Name ">
					</form>
					<small>Are you a member? <label for="flipper__checkbox" class="label label-info">Click here to login</label>.</small>

				</div>
			  </div>
			 <!--/div>
			</div-->	
		</div>
	</div>
</div>
<div class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="well foot-well">
					<h2>Contact</h2>
					<hr style="border: 1px solid yellow;">
					<p style="text-align:left;">Contact : &nbsp;<a href="callto:+9100000000">0123456789</a></p>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="well foot-well">
					<h2>About</h2>
					<hr style="border: 1px solid yellow;">
					<p style="text-align:left;">Develop by :&nbsp;<a href="http:/www.pvwebsolition.com">PV Web Solution</a></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="well foot-well-copy">
					<p>Copyright &copy; <?php echo date("Y"); ?>. All rights resurved </p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>


<?PHP


?>
