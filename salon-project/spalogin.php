<?php
session_start();

require_once 'dbconnect.php';

if (isset($_COOKIE["spa_user"])) {
$_SESSION['spa_user']= $_COOKIE["spa_user"];
 header("Location: spaarea.php");
 exit;
}

if (isset($_SESSION['spa_user'])!="") {
 header("Location: spa_login.php");
 exit;
}

if (isset($_POST['spaloginbtn'])) {

   $email = strip_tags($_POST['email']);
   $password = strip_tags($_POST['password']);

   $email = $DBcon->real_escape_string($email);
   $password = $DBcon->real_escape_string($password);
   $query = $DBcon->query("select * from  spadata where (spauser = '$email' OR spaemail = '$email')");
   //$query = $DBcon->query("SELECT * FROM providers WHERE email='$email and user_id='$userid''");
   $row=$query->fetch_array();

   /*$statement = $pdoObject->prepare($query);
   $statement->bindValue(":username", $login, PDO::PARAM_STR);
   $statement->bindValue(":password", $password, PDO::PARAM_STR);
   $statement->execute();*/
   $count = $query->num_rows;

   if (password_verify($password, $row['pass']) && $count==1) {
    $_SESSION['spa_user'] = $row['spaid'];
    setcookie("spa_user", $_SESSION['spa_user'], time() + (86400 * 30 * 12), "/");
    header("Location: userarea.php");
   } else {
    $matchmsg = "Invalid Email/Username or Password";
   }
   $DBcon->close();

  }
  ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Dashboard | Home </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!--meta name="google-site-verification" content="NMNyVxnKqYfv7TKLWjNGZ0GnhOHTlNHPaCwtIuOtRr4" /-->
		<!-- bootstrap links -->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="plugins/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="plugins/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="plugins/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="plugins/login/css/main.css">

	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery-1.11.3.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<link rel="shortcut icon" type="image/ico" href="img/fav.ico" />
	<link type="text/css" rel="stylesheet" href="./css/custom.css" />
	<script src="./js/custom.js" type="text/javascript"></script>
  <style>
    #singfrm{
      padding: 60px !important;
    }
  </style>
</head >
<body style="background-color:#ddd !important;">
<?php include_once("./inc/navbar.php"); ?>
	<br>
<div class="container-fluid new-container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12  ">
			<!--div class="panel panel-default">
				<div class="panel body"-->
					<input type="checkbox" name="flipper__checkbox" id="flipper__checkbox" class="flipper__checkbox" hidden />
						<div class="form__container">
				<!-- Back side -->
				<div class="form__signup" id="singfrm" >
				 <!--div class="form__login" align="center"-->

					<form class="login100-form validate-form" action="spalogin.php" method="POST">
						<div class="row">
		          <div class="input-field col s12 center">
		            <img src="images/Partner_App_Icon-04.png" alt="" width="200" style="margin-left:50px;margin-right:50px;" class="responsive-img valign profile-image-login">
		           <center><font size="2" color="#ff0000"><?php
        					if(isset($matchmsg)){
        					echo $matchmsg;
        					}
        					?></font></center>
		          </div>
		        </div>

					<span class="login100-form-title p-b-34 p-t-27">
						Spa/Parlour - Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username / Email</span>
						<input class="input100" type="text" name="email" placeholder="Type your username or email" maxlength="30">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password" maxlength="30">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div><br>

				<div class="text-right p-t-8 p-b-34">
					<center><div id="gcap" class="g-recaptcha" data-sitekey="6LcD-EQUAAAAAFM6bphzS7IXHhPWaBpoOsZqS6Uq"></div><center>
						<a href="#">
							Forgot password?
						</a>
					</div>

          <center><!--div type="submit" name="usrloginntn" class="sim-button button8"><span>Login</span></div-->
            <button type="submit" class="btn-block btn sub-btn" name="spaloginbtn">Login</button>
          </center>
      <br>


					<div class="text-center p-t-27 p-b-20">
						<span>
							<a href="./userreg.php" class="txt2">&nbsp;<label id="singfrmbtn" class="txt1 form__link">Register Here</a></label>&nbsp; Or Sign In Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

				</form>


				<!--/div-->
			  </div>
				</div>
			<!--/div>
		</div-->
	</div>
</div>
</div>
<div class="container-fluid">
	<div class="row footer">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="well foot-well">
						<h2>Contact</h2>
						<hr style="border: 1px solid yellow;">
						<p">Contact : &nbsp;<a href="callto:+9100000000">0123456789</a></p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="well foot-well">
						<h2>About</h2>
						<hr style="border: 1px solid yellow;">
						<p">Develop by :&nbsp;<a href="http:/www.pvwebsolition.com">PV Web Solution</a></p>
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
</div>
</body>
</html>


<?PHP


?>
