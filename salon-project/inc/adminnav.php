<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div id="mySidenav" class="sidenav ">
    <div class="container sml" style="background-color: #2874f0; padding-top: 10px;">
            <img style='margin-left:0px; padding-left:0px;' alt="Brand" src="./img/logo.png" width="50%">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav(),nvsh()">×</a>
    </div>
    <a class="dark-gray" href="./index.php">Account Settings</a>
    <a class="dark-gray" href="./about.php">Manage Spa / Parlour</a>
    <a class="dark-gray" href="./contact.php">Manage Customers</a>
	<a class="dark-gray" href="./contact.php">Manage Orders</a>
	<a class="dark-gray" href="./contact.php">Manage Website</a>
  <br><br>
  <a class="mob-link" href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
</div>
<div class="header-navbar navbar-fixed-top">
    <div class="container-fluid">

        <div id='lgnv' class="row row2">
            <div class="col-sm-4 col-md-2">
                <p style="margin:10px; color:#fff;  font-size:20px;"><span class="smallnav menu" onclick="openNav(),hd()">☰ Admin Panel</span></p>
                <p style="margin:0px; color:#fff; font-size:20px;"><span class="largenav">Admin Panel</span></p>
            </div>
            <div class="col-md-9 col-sm-8 col-md-offset-1">
                <ul class="list-chr largenav">
                    <li class="upper-links"><a class="links" href="./index.php"><span class="glyphicon glyphicon-globe"></span> View Website</a></li>
                    <?php
                    $query = $DBcon->query("SELECT * FROM providers WHERE user_id=".$_SESSION['aduser']);
                    $userRow=$query->fetch_array();
                    ?>
                    <li class="upper-links dropdown"><a class="links" href="#">Welcome - <?php echo $userRow['name']; ?></a>
                        <ul class="dropdown-menu " >
                            <li class="profile-li"><a class="drop" href="./accountset.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Account Setting</a></li>
                            <li class="profile-li"><a class="drop" href="./logout.php"><span class="glyphicon glyphicon-cog"></span>&nbsp;Logout</a></li>
                            <!--li class="profile-li"><a class="profile-links" href="#">Link</a></li>
                            <li class="profile-li"><a class="profile-links" href="#">Link</a></li>
                            <li class="profile-li"><a class="profile-links" href="#">Link</a></li>
                            <li class="profile-li"><a class="profile-links" href="#">Link</a></li>
                            <li class="profile-li"><a class="profile-links" href="#">Link</a></li-->
                        </ul>
                    </li>
                </ul>
             </div>
            <!--/div-->
        </div>
    </div>
</div>
