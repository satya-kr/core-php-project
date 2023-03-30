<?php
session_start();

require_once 'dbconnect.php';

if (isset($_COOKIE["aduser"])) {
$_SESSION['aduser']= $_COOKIE["aduser"];
 header("Location: settings.php");
 exit;
}

if (isset($_SESSION['aduser'])!="") {
 header("Location: login.php");
 exit;
}

if (isset($_POST['adlogin'])) {

 $email = strip_tags($_POST['email']);
 $password = strip_tags($_POST['password']);

 $email = $DBcon->real_escape_string($email);
 $password = $DBcon->real_escape_string($password);
 $query = $DBcon->query("select * from  providers where (user_id='$email' OR email = '$email')");
 //$query = $DBcon->query("SELECT * FROM providers WHERE email='$email and user_id='$userid''");
 $row=$query->fetch_array();

 /*$statement = $pdoObject->prepare($query);
 $statement->bindValue(":username", $login, PDO::PARAM_STR);
 $statement->bindValue(":password", $password, PDO::PARAM_STR);
 $statement->execute();*/
 $count = $query->num_rows;

 if (password_verify($password, $row['pass']) && $count==1) {
  $_SESSION['aduser'] = $row['user_id'];
  setcookie("aduser", $_SESSION['aduser'], time() + (86400 * 30 * 12), "/");
  header("Location: settings.php");
 } else {
  $msg = "Invalid Username or Password";
 }
 $DBcon->close();

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
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
		<link rel="stylesheet" href="./css/admin.css">
		<script src="./js/jquery-1.11.3.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<link rel="shortcut icon" type="image/ico" href="img/fav.ico" />
		<style>
			body{
				background: url('./img/back.jpg');
				background-size: 100%;
        background-repeat: repeat-y !important;
			}
      .logpnl{
        padding: 30px !important;
        margin-top: 30px !important;
      }

		</style>
	</head>
	<body>
		<div class="container">
					<div class="row">
            <div class="col-md-6 col-md-offset-3">
							<div class="panel panel-default logpnl">
								<div class="panel body">
									<input type="checkbox" name="flipper__checkbox" id="flipper__checkbox" class="flipper__checkbox" hidden />
									<div class="form__container">
								    <div class="form__login" id="logfrm">
									    <form class="login100-form validate-form " method="POST">
										     <span align="center" class="login100-form-title p-b-34 p-t-27">Login</span>
        									<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
        										<span class="label-input100">Username / Email</span>
        										<input class="input100" type="text" name="email" placeholder="Type your username">
        										<span class="focus-input100" data-symbol="&#xf206;"></span>
        									</div>

        									<div class="wrap-input100 validate-input" data-validate="Password is required">
        										<span class="label-input100">Password</span>
        										<input class="input100" type="password" name="password" placeholder="Type your password">
        										<span class="focus-input100" data-symbol="&#xf190;"></span>
        									</div>

          								<div class="text-right p-t-8 p-b-34">
          										<a href="#">
          											Forgot password?
          										</a>
          								</div>

        									<div class="container-login100-form-btn">
        										<div class="wrap-login100-form-btn">
        											<div class="login100-form-bgbtn"></div>
        											<button type="submit" name="adlogin" class="login100-form-btn">Login</button>
        										</div>
        									</div>
								       </form>
							       </div>
				          </div>
		           </div>
             </div>
           </div>
         </div>
       </div>


	</body>
</html>
