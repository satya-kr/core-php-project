<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['spa_user'])) {
 header("Location: spalogin.php");
}

$query = $DBcon->query("SELECT * FROM spadata WHERE user = ".$_SESSION['spa_user'] (user = '$email' OR email = '$email'));
$userRow=$query->fetch_array();
$from = $_SESSION['spa_user'];
$realpass =  $userRow['pass'];
$loc =  $userRow['location'];
$p=$userRow['credits'];

if(isset($_POST['submit']))
{

  $name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$phone = strip_tags($_POST['phone']);
	$loc = strip_tags($_POST['loc']);
	$query= "UPDATE spadata SET name='$name' ,email='$email' ,phone='$phone' ,location='$loc' WHERE  user_id=".$_SESSION['user'];
  if ($DBcon->query($query))
 {
$msg = '<div class="alert alert-success" role="alert">
<strong>Success !</strong> User has been successfully updated
</div>';

}
 else
 {
    $msg = '<div class="alert alert-danger" role="alert">
    <strong> Error !</strong> User was not updated
</div>';

}

}


if(isset($_POST['password']))
{

	$pass = strip_tags($_POST['pass']);
	$opass = strip_tags($_POST['opass']);
	$pass = password_hash($pass, PASSWORD_DEFAULT);
	$query= "UPDATE spadata SET pass='$pass' WHERE  user_id=".$_SESSION['user'];

if(password_verify($opass, $realpass)){
  if ($DBcon->query($query))
 {
$msg = '<div class="alert alert-success" role="alert">
<strong>Success !</strong> User has been successfully updated
</div>';

}
 else
 {
    $msg = '<div class="alert alert-danger" role="alert">
    <strong> Error !</strong> User was not updated
</div>';

}
}
else{
  $msg = '<div class="alert alert-danger" role="alert">
    <strong> Error !</strong> Old pass not correct
</div>';
}
}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Provider's Area | Hi' <?php echo $userRow['name']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/user.css" >
  <link rel="stylesheet" href="./css/custom.css" >
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <script src="./js/jquery-1.11.3.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/custom.js"></script><style>
    body{
      background:url('./img/auth-back.jpg');
      background-size: 30%;
    }
  </style>
</head>
<body>
  <br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
  <?php include_once("./inc/usernav.php"); ?>

  	<section id="breadcrumb">
  		<div class="container">
  			<ol class="breadcrumb">
  				<li><p><span class="glyphicons glyphicons-bell"></span></p></li>
          <li></li>
  			</ol>
  		</div>
  	</section>

  	<section id="main">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-3">
  					<div  class="list-group new-listgp mnu">
  					  <a href="#" class="list-group-item active min-color-bg"><span class="glyphicon glyphicon-cog"></span>&nbsp; Dashboard </a>
  					  <a href="./managespa.php" class="list-group-item"><span class="glyphicon glyphicon-chevron-right glyspin"></span>&nbsp; Manage Spa / Parlour <span class="badge">120</span></a>
  					  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-chevron-right glyspin"></span>&nbsp; Manage Customers <span class="badge">1200</span></a>
              <a href="#" class="list-group-item"><span class="glyphicon glyphicon-chevron-right glyspin"></span>&nbsp; Manage Orders <span class="badge">1200</span></a>
              <a href="#" class="list-group-item"><span class="glyphicon glyphicon-chevron-right glyspin"></span>&nbsp; Manage Website</a>
  					</div>

  					<div class="well disk-info">
  						<h4>Users Limit</h4>
  						<div class="progress">
  							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
  								aria-valuemin="0" aria-valuemax="100" style="width:40%">
  								40%
  							</div>
  						</div>
              <h5><b>Limit : </b>0010</h5>
              <hr style="border-color:#333;">
  						<h4>Expiration</h4>
  						<div class="progress">
  						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
  						  aria-valuemin="0" aria-valuemax="100" style="width:50%">
  							50%
  						  </div>
  						</div>
              <h5><b>Limit : </b>0010</h5>
  					</div>
  				</div>
  				<div class="col-md-9">
  				<div class="panel panel-default site-view">
  				  <div class="panel-heading min-color-bg">
  					<h3 class="panel-title">Website Overview</h3>
  				  </div>
  				  <div class="panel-body">
  					<div class="col-md-3 col-sm-6 col-xs-6">
  						<div class="well dash-box">
  							<h2><span class="glyphicon glyphicon-user"></span></h2><h3>	1200</h3>
  							<h4>Users</h4>
  						</div>
  					</div>
  					<div class="col-md-3 col-sm-6 col-xs-6">
  						<div class="well dash-box">
  							<h2><span class="glyphicon glyphicon-list-alt"></span></h2><h3>	12</h3>
  							<h4>Pages</h4>
  						</div>
  					</div>

  					<div class="col-md-3 col-sm-6 col-xs-6">
  						<div class="well dash-box">
  							<h2><span class="glyphicon glyphicon-pencil"></span></h2><h3> 120</h3>
  							<h4>Posts</h4>
  						</div>
  					</div>

  					<div class="col-md-3 col-sm-6 col-xs-6">
  						<div class="well dash-box">
  							<h2><span class="glyphicon glyphicon-stats"></span></h2><h3> 12,000</h3>
  							<h4>Visitors</h4>
  						</div>
  					</div>
  				  </div>
  				</div>

  				<div class="panel panel-default lts-book">
  					<div class="panel-heading min-color-bg">
  							<h3 class="panel-title">Latest Bookings</h3>
  					</div>
  					<div class="panel-body">
  						<table class="table table-hover table-striped">
  							<thead>
  							  <tr>
  								<th>Order Id</th>
  								<th>Username</th>
  								<th>Date</th>
  								<th></th>
  							  </tr>
  							</thead>
  							<tbody>
  							  <tr>
  								<td>100</td>
  								<td>Doe</td>
  								<td>12-03-2017</td>
  								<td><button class="btn btn-info btn-md pull-right">View Details</button> </td>
  							  </tr>
  							  <tr>
  								<td>Mary</td>
  								<td>Moe</td>
  								<td>mary@example.com</td>
  								<td>12-03-2017</td>
  							  </tr>
  							  <tr>
  								<td>July</td>
  								<td>Dooley</td>
  								<td>july@example.com</td>
  								<td>12-03-2017</td>
  							  </tr>
  							</tbody>
  						</table>
  					</div>
  				</div>

  				<div class="panel panel-default lts-user">
  					<div class="panel-heading min-color-bg">
  							<h3 class="panel-title">Latest Users</h3>
  					</div>
  					<div class="panel-body">
  						<table class="table table-hover table-striped">
  							<thead>
  							  <tr>
  								<th>Firstname</th>
  								<th>Lastname</th>
  								<th>Email</th>
  								<th>Join Date</th>
  							  </tr>
  							</thead>
  							<tbody>
  							  <tr>
  								<td>John</td>
  								<td>Doe</td>
  								<td>john@example.com</td>
  								<td>12-03-2017</td>
  							  </tr>
  							  <tr>
  								<td>Mary</td>
  								<td>Moe</td>
  								<td>mary@example.com</td>
  								<td>12-03-2017</td>
  							  </tr>
  							  <tr>
  								<td>July</td>
  								<td>Dooley</td>
  								<td>july@example.com</td>
  								<td>12-03-2017</td>
  							  </tr>
  							</tbody>
  						</table>
  					</div>
  				</div>
  				</div>
  			</div>
  		</div>
  	</section>
  </div>
</div>
</div>
</body>
</html>
