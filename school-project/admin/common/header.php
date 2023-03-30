<?php  include("../includes/conn.php");  ?>
<?php 
   // if($_SESSION[ "login_username" ]=='' && $_SESSION[ "login" ]=='') { header("location:index.php");} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Dashboard</title>
<link rel="stylesheet" href="<?php  echo $site_url;?>assets/vendors/core/core.css">
<link rel="stylesheet" href="<?php  echo $site_url;?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php  echo $site_url;?>assets/fonts/feather-font/css/iconfont.css">
<link rel="stylesheet" href="<?php  echo $site_url;?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="<?php  echo $site_url;?>assets/css/demo_1/style.css">
<link rel="shortcut icon" href="<?php  echo $site_url;?>assets/images/favicon.png" />
<link rel="stylesheet" href="<?= $site_url ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">

    
    <link rel="stylesheet" href="<?php echo $site_url; ?>assets/vendors/select2/select2.min.css">
    
    
<link rel="stylesheet" href="<?php echo $site_url; ?>assets/fonts/feather-font/css/iconfont.css">
<link rel="stylesheet" href="<?php echo $site_url; ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="<?php echo $site_url; ?>assets/css/demo_1/style.css">
<link rel="shortcut icon" href="<?php echo $site_url; ?>assets/images/favicon.png" />
    
</head>

<?php

// echo "username".$_SESSION[ "login_username" ] ;
// echo "<br>Login type".$_SESSION[ "login_type" ] ;
// echo "<br>login Id: ".$_SESSION[ "login_id" ] ;
// echo "<br>Login".$_SESSION[ "login" ] ;
// exit;
?>