<?php
session_start();
require_once 'dbconnect.php';

if (isset($_COOKIE["spa_user"])) {
$_SESSION['spa_user']= $_COOKIE["spa_user"];
 header("Location: index.php");
 exit;
}

if (isset($_SESSION['spa_user'])!="") {
 header("Location: spareg.php");
 exit;
}
/*error_reporting(0);
ini_set('display_errors', 0);*/
if(isset($_POST['sparegbtn'])) {

     //$name = test_input($_POST["spaname"]);

 $spaname = $_POST['spaname'];
 $spauser = $_POST['spauser'];
 $spaemail = $_POST['spaemail'];
 $spamobile = $_POST['spamobile'];
 $spatype = $_POST['spatype'];
 $spacap = $_POST['spacap'];
 $spaaddr = $_POST['spaaddr'];
 $spacity = $_POST['spacity'];
 $spastate = $_POST['spastate'];
 $spapincode = $_POST['spapincode'];
 $spapass = $_POST['spapass'];
 $spaconpass = $_POST['spaconpass'];


 $spa_name = $DBcon->real_escape_string($spaname);
 $spa_user = $DBcon->real_escape_string($spauser);
 $spa_email = $DBcon->real_escape_string($spaemail);
 $spa_mobile = $DBcon->real_escape_string($spamobile);
 $spa_type = $DBcon->real_escape_string($spatype);
 $spa_cap = $DBcon->real_escape_string($spacap);
 $spa_addr = $DBcon->real_escape_string($spaaddr);
 $spa_city = $DBcon->real_escape_string($spacity);
 $spa_state = $DBcon->real_escape_string($spastate);
 $spa_pincode = $DBcon->real_escape_string($spapincode);
 $spa_conpass = $DBcon->real_escape_string($spaconpass);
//  $variable = $DatabaseConnectionVariable->real_escape_string($declearedVariable);

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

  if( trim($spaname)=='' || trim($spauser)=='' || trim($spaemail)=='' || trim($spamobile)=='' || trim($spatype)=='' || trim($spacap)=='' || trim($spaaddr)=='' || trim($spacity)=='' || trim($spastate)=='' || trim($spapincode)=='' || trim($spapass)=='' || trim($spaconpass)=='')
  {
        $fildblnk = "<div class='alert alert-danger myalert'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Fields are blank!
                    </div>";
          if ($captcha_success->success==false)
          {

    	         $msg ='<div class="alert alert-danger myalert" role="alert">
                        <strong>Error !</strong> Captcha Error
                      </div>';
    	    }
    }
    else if($spapass !== $spaconpass )
    {
      $passwd ='<div class="alert alert-danger myalert" role="alert">
               <strong>Error !</strong> Password not match !
             </div>';

    }else{

      if ($captcha_success->success==false)
      {

	         $msg ='<div class="alert alert-danger myalert" role="alert">
                    <strong>Error !</strong> Captcha Error
                  </div>';
	    }
      else if ($captcha_success->success==true)
      {

         $hashed_password = password_hash($spa_conpass, PASSWORD_DEFAULT);
      //   $check_email = $DBcon->query("SELECT spaemail FROM spadata WHERE spaemail = '$spaemail'");
      //   $count=$check_email->num_rows;
         $check_phone = $DBcon->query("SELECT spamobile FROM spadata WHERE spamobile ='$spamobile'");
         $count=$check_phone->num_rows;

           if ($count == 0)
           {
             $createdate= date('Y-m-d H:i:s');
            //  $createdate= date('Y-m-d');
              $sndxy = $_COOKIE['sndx'];
              if($sndxy == 1)
					    {
              $query =" INSERT INTO `spadata` (`spaname`, `spaemail`, `spamobile`, `spauser`, `spapass`, `spatype`, `spacapa`, `spaaddr`, `spacity`, `spastate`, `spapincode`,`created_at`) VALUES ('$spa_name', '$spa_email', '$spa_mobile', '$spa_user', '$hashed_password', '$spa_type', '$spa_cap', '$spa_addr', '$spa_city', '$spa_state', '$spa_pincode', '$createdate')";

              if ($DBcon->query($query)) {

                  $success = "<div class='alert alert-success mysuccess'>
            			               <span class='glyphicon glyphicon-info-sign'></span> &nbsp; You are successfully register !
            			           </div>";
                             //header("Location: login.php");
              }else {
                  $msg = "Error while registering";
              }
            }
            else{
                  $msg2 = "<div class='alert alert-danger myalert'>
                			 <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Please enter valid details !
                			</div>";
            }

           }
           else
           {
            /*$msg = "<div class='alert alert-danger'>
               <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
              </div>";*/
          	$matchmsg = "<div class='alert alert-danger myalert'>
          			 <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry mobile number already taken !
          			</div>";

           }

          $DBcon->close();
        }
    }
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Spa Registration </title>
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
  <script>

  function namechk(){
    var n,n1,nn;
    n=document.getElementById("spanm");
    n1=document.getElementById("spanm").value;
    nn=/^[a-zA-Z ]+$/;
    if(!n.value.match(nn) || n1.charCodeAt(0)==32)
    {
      $('#clrx').css("border-bottom","2px solid red");
      $('#spanm').css("color","red");
      document.getElementById("nmerr").innerHTML="Please enter valid name !";
      $('#nmerr').show();
    return 0;
      }
    else{
      $('#clrx').css("border-bottom","2px solid green");
      $('#spanm').css("color","green");
      $('#nmerr').hide();
    //  document.getElementById("nmerr").innerHTML="valid";
    return 1;
      }
  }

  function mobilchk(){
    var m,m1,mm;
    m=document.getElementById("phn");
    m1=document.getElementById("phn").value;
    mm=/^[0-9]{10,10}$/;
    if(!m.value.match(mm))
    {
      $('#phndiv').css("border-bottom","2px solid red");
      $('#phn').css("color","red");
      document.getElementById("phnerr").innerHTML="Please enter valid mobile number !";
      $('#phnerr').show();
      return 0;
    }
    else{
      $('#phndiv').css("border-bottom","2px solid green");
      $('#phn').css("color","green");
      document.getElementById("phnerr").innerHTML="";
      $('#phnerr').hide();
      return 1;
    }
  }
  /*function emailchk(){
    var e,e1,ee;
    e=document.getElementById("emil");
    e1=document.getElementById("emil").value;
    ee=/^[a-zA-Z0-9.a-zA-Z]+\@[a-zA-Z0-9]+\.[a-zA-Z.]{2,6}$/;
    if(!e.value.match(ee))
    {
      document.getElementById("v3").src="vv1.png";
      document.getElementById("em").innerHTML="Invalid";
      return 0;
    }
    else{
      document.getElementById("v3").src="vv2.png";
      document.getElementById("em").innerHTML="";
      return 1;
    }
  }*/

  function pincode(){
    var ig,ig1,igg;
    ig=document.getElementById("pin");
    ig1=document.getElementById("pin").value;
    igg=/^\d{6}$/;
    if(!ig.value.match(igg))
    {
      $('#pindiv').css("border-bottom","2px solid red");
      $('#pin').css("color","red");
      document.getElementById("pinerr").innerHTML="Please enter valid pincode !";
      $('#pinerr').show();
      return 0;
    }
    else{
      $('#pindiv').css("border-bottom","2px solid green");
      $('#pin').css("color","green");
      document.getElementById("pinerr").innerHTML="";
      $('#pinerr').hide();
      return 1;
    }
  }
  function passchk()
  {
    var ps,pas ,ps2;
    ps=document.getElementById("pass1").value;
    ps2=document.getElementById("pass2").value;
    if(ps==ps2)
    {
      $('#passdiv').css("border-bottom","2px solid green");
      $('#pass2').css("color","green");
      document.getElementById("passsuc").innerHTML="Password matched";
      $('#passerr').hide();
      $('#passsuc').show();
      return 1;
    }
    else{
      $('#passdiv').css("border-bottom","2px solid red");
      $('#pass2').css("color","red");
      document.getElementById("passerr").innerHTML="Confirm password not match !";
      $('#passsuc').hide();
      $('#passerr').show();
      return 0;
    }
  }

  function sndchk(r)
  {
    if(namechk()==1 && mobilchk()==1 && pincode()==1 && passchk()==1)
    {
      document.cookie="sndx=1";
    }
    else
    {
      namechk();
      mobilchk();
      pincode();
      passchk();
      document.cookie="sndx=0";
    }
  }

</script>
  <style>
    select{
      border: none !important;
    }
    select:focus{
    outline: none;
    }
    .row2 {
    padding-top: 5px !important;
    padding-bottom: 0px !important;
    }
    .jserr{
      float: right!important;
      padding-top: 8px !important;
    }
    .myalert{
      color: #ffffff !important;
      background-color: #b11b29 !important;
      border-color: #b11b29 !important;
      font-size: 16px !important;
      font-family: verdana !important;
    /* box-shadow: 0px 1px 5px 1px #ff8302; */
    }
    .mysuccess{
      color: #252424 !important;
      background-color: #4fd08e !important;
      border-color: #1e7348 !important;
      font-size: 16px !important;
      font-family: verdana !important;
      /* box-shadow: 0px 1px 5px 1px #ff8302; */
  }
  </style>
</head >
<body style="background-color:#ddd !important;">
<?php include_once("./inc/navbar.php"); ?>
<br>
<div class="container-fluid new-container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-md-4 col-sm-offset-3  ">
		<!--input type="checkbox" name="flipper__checkbox" id="flipper__checkbox" class="flipper__checkbox" hidden /-->
    <br>
			<div class="form__container">
				<div class="form__signup" id="singfrm" >

          <div class="row">
        		<div class="input-field col s12 center">
        		    <center>
                  <font size="2" color="#ff0000">
                    <?php
                      if(isset($msg)){
                          echo $msg;
                        }
                    ?>
                    <?php
                      if(isset($msg2)){
                          echo $msg2;
                        }
                    ?>
                    <?php
                      if(isset($success)){
                          echo $success;
                        }
                    ?>
                    <?php
                      if(isset($fildblnk)){
                          echo $fildblnk;
                        }
                    ?>
                    <?php
                      if(isset($passwd)){
                          echo $passwd;
                        }
                    ?>
                 </font>
                </center>
        		 </div>
        	</div>

					<form class="login100-form validate-form" action="spareg.php" method="POST">
            <?php
            /*if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $name = $_POST["spaname"];
                  //  $field = filter_var(trim($name), FILTER_SANITIZE_STRING);
            }*/
            ?>
  					<span class="login100-form-title p-b-34 p-t-27">
  						Spa Registration
  					</span>
            <div class="wrap-input100 validate-input m-b-23" id="clrx" data-validate = "Spa/Parlour Name is reauired">
              <span class="label-input100">Spa / Parlour Name</span>
              <input class="input100 validate" type="text" id='spanm' value="<?php echo $spaname;?>" onblur="namechk()" name="spaname" placeholder="Type your Spa Name" maxlength="100" >
              <span class="focus-input100 " data-symbol="&#9998;"></span>
              <font align="right" class="jserr" color="red"><span id="nmerr"></span></font>
            </div>

  					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
  						<span class="label-input100 ">Username</span>
  						<input class="input100" type="text" name="spauser" value="<?php echo $spauser;?>" placeholder="Type your username" maxlength="30" >
              <span class="focus-input100" data-symbol="&#xf206;"></span>
  					</div>

            <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
  						<span class="label-input100">Email</span>
  						<input class="input100 validate" type="email" name="spaemail" value="<?php echo $spaemail;?>" placeholder="Type your Email" >
  						<span class="focus-input100" data-symbol="&#xf15a;"></span>
  					</div>

  					<div class="wrap-input100 validate-input m-b-23" id="phndiv" data-validate = "Mobile No. is reauired">
  						<span class="label-input100 validate">Mobile No.</span>
  						<input class="input100" type="text" name="spamobile" id="phn" onblur="mobilchk()" value="<?php echo $spamobile;?>" placeholder="Type your Mobile No." maxlength="10" >
  						<span class="focus-input100" data-symbol="&#xf2be;"></span>
              <font align="right" class="jserr" color="red"><span id="phnerr"></span></font>
  					</div>

            <div class="wrap-input100 validate-input m-b-23" data-validate = "Parlour Type is reauired" >
  						<span class="label-input100 validate">Select Parlour Type</span>
              <select class="input100"  name='spatype' >
								<?php echo "<option value=''>Select Spa / Parlour Type </option>";
								$spaty =$DBcon->query("select * from gender");
									if(!$spaty)
									{
										echo mysql_error();
									}
									else
									{
										while($sparow = $spaty->fetch_array())
										{
											echo "<option value='$sparow[1]'>$sparow[1]</option>";
										}
									}
							    ?></select>
  						<span class="focus-input100" data-symbol="&#63;"></span>
  					</div>

            <div class="wrap-input100 validate-input m-b-23" data-validate = "Seating capacity is reauired">
  						<span class="label-input100 validate">Seating capacity</span>
              <select class="input100"  name='spacap' >
								<?php echo "<option value=''>Select Seating capacity </option>";
								$sit = $DBcon->query("select * from extra");
									if(!$sit)
									{
										echo mysql_error();
									}
									else
									{
										while($sitrow = $sit->fetch_array())
										{
											echo "<option value='$sitrow[1]'>$sitrow[1]</option>";
										}
									}
							    ?></select>
  						<span class="focus-input100" data-symbol="&#9855;"></span>
  					</div>

            <div class="wrap-input100 validate-input m-b-23" id="addrsdiv" data-validate = "Spa/Parlour Address is reauired">
              <span class="label-input100">Address</span>
              <input class="input100 validate" type="text" id="addrs" value="<?php echo $spaemail;?>" name="spaaddr" placeholder="Type spa address" maxlength="100" >
              <span class="focus-input100 " data-symbol="&#9998;"></span>
              <font align="right" color="red"><span id="addrserr"></span></font>
            </div>

            <div class="wrap-input100 validate-input m-b-23" data-validate = "City is reauired" required>
  						<span class="label-input100 validate">City</span>
              <select class="input100"  name='spacity' >
								<?php echo "<option value=''>Select Spa City</option>";
								$selcity = $DBcon->query("select * from statelist");
									if(!$selcity)
									{
										echo mysql_error();
									}
									else
									{
										while($cityrow = $selcity->fetch_array())
										{
											echo "<option value='$cityrow[1]'>$cityrow[1]</option>";
										}
									}
							    ?></select>
  						<span class="focus-input100" data-symbol="&#9784;"></span>
  					</div>

            <div class="wrap-input100 validate-input m-b-23" data-validate = "State is reauired">
  						<span class="label-input100 validate">State</span>
              <select class="input100"  name='spastate' >
								<?php echo "<option value=''>Select Spa State</option>";
								$selstate = $DBcon->query("select * from india");
									if(!$selstate)
									{
										echo mysql_error();
									}
									else
									{
										while($staterow = $selstate->fetch_array())
										{
											echo "<option value='$staterow[1]'>$staterow[1]</option>";
										}
									}
							    ?></select>
  						<span class="focus-input100" data-symbol="&#9992;"></span>
  					</div>

            <div class="wrap-input100 "  id="pindiv" data-validate="Pincode is required">
  						<span class="label-input100">Pincode</span>
  						<input class="input100" type="text" id="pin" value="<?php echo $spapincode;?>" name="spapincode" onblur="pincode()" placeholder="Type your pincode" maxlength="6" >
  						<span class="focus-input100" data-symbol="&#9899;"></span>
              <font align="right" class="jserr" color="red"><span id="pinerr"></span></font>
  					</div>

  					<div class="wrap-input100 validate-input" data-validate="Password is required">
  						<span class="label-input100">Password</span>
  						<input class="input100" type="password" id="pass1" name="spapass" placeholder="Type your password" maxlength="30" >
  						<span class="focus-input100" data-symbol="&#xf190;"></span>
  					</div><br>

  					<div class="wrap-input100 validate-input m-b-23" id="passdiv" data-validate = "Password is required">
  						<span class="label-input100">Confirm Password</span>
  						<input class="input100" type="password" name="spaconpass" onblur="passchk()" id="pass2" placeholder="Re-type your password" maxlength="30" >
  						<span class="focus-input100" data-symbol="&#xf190;"></span>
              <font align="right" class="jserr" color="red"><span id="passerr"></span></font>
              <font align="right" class="jserr" color="green"><span id="passsuc"></span></font>
  					</div>

				    <div class="text-right p-t-8 p-b-34">
					    <center><div id="gcap" class="g-recaptcha" data-sitekey="6LcD-EQUAAAAAFM6bphzS7IXHhPWaBpoOsZqS6Uq"></div><center>
  						<a href="#">
  							Forgot password?
  						</a>
					  </div>

							<center>
                <button type="submit" class="btn-block btn sub-btn" onclick="sndchk()" name="sparegbtn">Register</button>
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
