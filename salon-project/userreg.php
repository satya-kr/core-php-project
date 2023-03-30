<?php
session_start();
require_once 'dbconnect.php';

if (isset($_COOKIE["user"])) {
$_SESSION['user']= $_COOKIE["user"];
 header("Location: userreg.php");
 exit;
}

if (isset($_SESSION['user'])!="") {
 header("Location: userreg.php");
 exit;
}
/*error_reporting(0);
ini_set('display_errors', 0);*/
if(isset($_POST['usrregbtn'])) {

 //$name = $_POST['name'];
 //$email = $_POST['email'];
 $usr = $_POST['cus_user'];
 $pass = $_POST['crepass'];
 $phone = $_POST['cmobile'];
 //$r = $_POST['r']; //referred_by

 //$uname = $DBcon->real_escape_string($name);
 //$email = $DBcon->real_escape_string($email);
 $cusr = $DBcon->real_escape_string($usr);
 $upass = $DBcon->real_escape_string($pass);
 $cphone = $DBcon->real_escape_string($phone);
//  $r = $DBcon->real_escape_string($r);



	$response = $_POST["g-recaptcha-response"];
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6LcD-EQUAAAAAAgjDQT1yk311YPu1bFS2miif9nK',
		'response' => $_POST["g-recaptcha-response"]
	);
	$quer = http_build_query($data);
	$options = array(
		'http' => array (
			'header' => 'Content-Type: application/x-www-form-urlencoded\r\n'.
                    'Content-Length: '.strlen($quer).'\r\n'.
                    'User-Agent:MyAgent/1.0\r\n',
			'method' => 'POST',
			'content' => $quer,
		),
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);


 if ($captcha_success->success==false) {
	 $msg ='<div class="alert alert-danger" role="alert">
<strong>Error !</strong> Captcha Error
</div>';
	} else if ($captcha_success->success==true) {
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT);
 $check_phone = $DBcon->query("SELECT phone FROM cusers WHERE phone='$phone'");
 $count=$check_phone->num_rows;

 if ($count==0) {

  $query = "INSERT INTO cusers(user,phone,pass) VALUES('$cusr','$cphone','$hashed_password')";

  if ($DBcon->query($query)) {
		echo "<script>alert('successfully register');</script>";
   //header("Location: login.php");

  }else {
   $msg = "Error while registering";
  }

 } else {


  /*$msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
    </div>";*/
	$matchmsg = "<div class='alert alert-danger'>
			 <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry mobile number already taken !
			</div>";

 }

 $DBcon->close();
}

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
	<link type="text/css" rel="stylesheet" href="./css/custom.css" />
	<script src="./js/custom.js" type="text/javascript"></script>

</head >
<body style="background-color:#ddd !important;">
<?php include_once("./inc/navbar.php"); ?>
<br>
<div class="container-fluid new-container">
	<div class="row">
		<div class="input-field col s12 center">
			<img src="images/Partner_App_Icon-04.png" alt="" width="200" style="margin-left:50px;margin-right:50px;" class="responsive-img valign profile-image-login">
		    <center>
          <font size="2" color="#ff0000">
            <?php
              if(isset($matchmsg)){
                  echo $matchmsg;
                }
            ?>
         </font>
        </center>
		 </div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-md-4 col-sm-offset-3  ">
		<!--input type="checkbox" name="flipper__checkbox" id="flipper__checkbox" class="flipper__checkbox" hidden /-->
			<div class="form__container">
				<div class="form__signup" id="singfrm" >
					<form class="login100-form validate-form" action="userreg.php" method="POST">
  					<span class="login100-form-title p-b-34 p-t-27">
  						Registration
  					</span>

					<!--div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name is reauired">
						<span class="label-input100"">Full Name</span>
						<input class="input100" type="text" name="username" placeholder="Type your Full Name">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
						<span class="label-input100"">Email</span>
						<input class="input100" type="text" name="username" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf15a;"></span>
					</div-->

  					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
  						<span class="label-input100">Username</span>
  						<input class="input100" type="text" name="cus_user" placeholder="Type your username" maxlength="30">
  						<span class="focus-input100" data-symbol="&#xf206;"></span>
  					</div>

  					<div class="wrap-input100 validate-input m-b-23" data-validate = "Mobile No. is reauired">
  						<span class="label-input100">Mobile No.</span>
  						<input class="input100" type="text" name="cmobile" placeholder="Type your Mobile No." maxlength="10">
  						<span class="focus-input100" data-symbol="&#xf2be;"></span>
  					</div>

  					<div class="wrap-input100 validate-input" data-validate="Password is required">
  						<span class="label-input100">Password</span>
  						<input class="input100" type="password" name="cpass" placeholder="Type your password" maxlength="30">
  						<span class="focus-input100" data-symbol="&#xf190;"></span>
  					</div><br>

  					<div class="wrap-input100 validate-input m-b-23" data-validate = "Password is required">
  						<span class="label-input100">Confirm Password</span>
  						<input class="input100" type="password" name="crepass" placeholder="Re-type your password" maxlength="30">
  						<span class="focus-input100" data-symbol="&#xf190;"></span>
  					</div>

				    <div class="text-right p-t-8 p-b-34">
					    <center><div id="gcap" class="g-recaptcha" data-sitekey="6LcD-EQUAAAAAFM6bphzS7IXHhPWaBpoOsZqS6Uq"></div><center>
  						<a href="#">
  							Forgot password?
  						</a>
					  </div>

							<center>
                <button type="submit" class="btn-block btn sub-btn" name="usrregbtn">Register</button>
              </center>
					<br>


					<div class="text-center p-t-27 p-b-20">
						<span>
							Already Registered <a href="./userlogin.php" class="txt2">&nbsp;<label id="singfrmbtn" class="txt1 form__link">Login Here</a></label>&nbsp; Or Sign Up Using
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
