<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/admin.css" >
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <script src="./js/jquery-1.11.3.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/custom.js"></script>
  
</head>
<body>
<?php include_once("./inc/adminnav.php"); ?>

	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-sm-10">
					<h1><span class="glyphicon glyphicon-cog" ></span> Dashboard <small> Manage Your Site</small></h1>
				</div>
			</div>
		</div>
	</header>
	
	<section id="breadcrumb">
		<div class="container">
			<ol class="breadcrumb">
				<li class=" active">Dashboard</li>
			</ol>
		</div>
	</section>
	
	<section id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div  class="list-group new-listgp">
					  <a href="#" class="list-group-item active min-color-bg"><span class="glyphicon glyphicon-cog"></span> Dashboard </a>
					  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span> Pages <span class="badge">12</span></a>
					  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Posts <span class="badge">120</span></a>					  					  
					  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Users <span class="badge">1200</span></a>
					</div>		
				
					<div class="well disk-info">
						<h4> Disk Space Used</h4>
						<div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
								aria-valuemin="0" aria-valuemax="100" style="width:40%">
								40% 
							</div>
						</div>
						<h4>Bandwidth Used</h4>
						<div class="progress">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
						  aria-valuemin="0" aria-valuemax="100" style="width:50%">
							50% 
						  </div>
						</div>
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
				
				<div class="panel panel-default">
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
				
				<div class="panel panel-default">
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

	
	
	
	
	
	
	
	
</body>
</html>