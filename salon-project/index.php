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
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script-->

  <!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <!-- Custom Css and Links -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
		<script src="./js/jquery-1.11.3.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/ico" href="img/fav.ico" />
  <link type="text/css" rel="stylesheet" href="./css/custom.css" />
  <script src="./js/custom.js" type="text/javascript"></script>
	<script>
$(".carousel").swipe({

  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

    if (direction == 'left') $(this).carousel('next');
    if (direction == 'right') $(this).carousel('prev');

  },
  allowPageScroll:"vertical"

});
</script>
</head>
<body id="bd">
<script>
$(window).on('load',function(){
       // $('#loginModel').modal('show');
    
	setTimeout(function(){
        $("#loginModel").modal('show');
    }, 9000);
});
</script>
<?php include_once("./inc/model.php"); ?>
<?php include_once("./inc/navbar.php"); ?>
			<?php include_once("./inc/carosul.php"); ?>
	

<div class="container new-container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col">
			<div class="col-md-4 col-xs-6 col-sm-4">
				<a href='./auth.php'><div class="well dash-box">
						<p><img src="./img/male.png"  style="padding:5px;" class="img-thumbnail" width="300px"></p>
						<p class="texts">Male</p>	
				</div></a>
			</div>

		<div class="col-md-4 col-xs-6 col-sm-4">
			<div class="well dash-box">
				<p><img src="./img/female.png" style="padding:5px;" class="img-thumbnail" width="300px"></p>
				<p class="texts">Female</p>
				
			</div>
		</div>
		<div class="col-md-4 col-xs-6 col-sm-4">
			<div class="well dash-box">
					<p><img src="./img/unisex.png" style="padding:5px;" class="img-thumbnail" width="300px"></p>
					<p class="texts">Unisex</p>
			</div>
		</div>
		
		<div class="col-md-4 col-xs-6 col-sm-4">
				<div class="well dash-box">
						<p><img src="./img/male.png"  style="padding:5px;" class="img-thumbnail" width="300px"></p>
						<p class="texts">Male</p>	
				</div>
			</div>

		<div class="col-md-4 col-xs-6 col-sm-4">
			<div class="well dash-box">
				<p><img src="./img/female.png" style="padding:5px;" class="img-thumbnail" width="300px"></p>
				<p class="texts">Female</p>
				
			</div>
		</div>
		<div class="col-md-4 col-xs-6 col-sm-4">
			<div class="well dash-box">
					<p><img src="./img/unisex.png" style="padding:5px;" class="img-thumbnail" width="300px"></p>
					<p class="texts">Unisex</p>
			</div>
		</div>
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
