<?php 
    include("./includes/conn.php"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/main.css">
    <link rel="stylesheet" href="./asset/css/responsive.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Home | St. Peters School</title>
</head>
<body>
    <header>
        <div class="header-container">
            <a href="index.php" class="header-left">
                <img src="./asset/img/logo.png" alt="" class="d-block logo img-fluid">
                <span class="logo-text d-block">
                    <p>St. Peter's School</p>
                    <p>B. T. Sarkar Road, Purulia</p>
                </span>
            </a>
            <div id="menu-btn">
                <span class="menu-bar"></span>
                <span class="menu-bar second"></span>
                <span class="menu-bar"></span>
            </div>
            <nav>
                <a href="index.php" class="d-block nav-link">
                    <span class="nav-text active">Home</span>
                </a>
                <a href="about-us.php" class="d-block nav-link">
                    <span class="nav-text">About Us</span>
                </a>
                <a href="online-class.php" class="d-block nav-link">
                    <span class="nav-text">Online Class</span>
                </a>
                <div href="academy.php" class="d-block nav-link has-sublink">
                    <span class="nav-text">Academy</span>
                    <div class="sublink-cover">
                        <a href="school-activity.php" class="sublink">School Activity</a>
                        <a href="art-work.php" class="sublink">Art Work</a>
                        <a href="lab.php" class="sublink">Labs</a>
                        <a href="club.php" class="sublink">Clubs</a>
                        <a href="class-activity.php" class="sublink">Class Activity</a>
                        <a href="events.php" class="sublink">Events</a>
                    </div>
                </div>
                <a href="gallery.php" class="d-block nav-link">
                    <span class="nav-text">Gallery</span>
                </a>
                <a href="our-staff.php" class="d-block nav-link">
                    <span class="nav-text">Our Staff</span>
                </a>
                <a href="contact.php" class="d-block nav-link">
                    <span class="nav-text">Contact</span>
                </a>
            </nav>
            <div class="header-right">
                <a href="" class="btn log-in">Log In</a>
                <!-- <a href="" class="btn register">Register</a> -->
            </div>
        </div>
        <div id="mobile-menu">
            <div class="mobile-menu-container">
                <div id="cross-btn" class="d-block">&#10005;</div>
                <nav>
                    <a href="index.php" class="d-block nav-link">
                        <span class="nav-text">Home</span>
                    </a>
                    <a href="about-us.php" class="d-block nav-link">
                        <span class="nav-text">About Us</span>
                    </a>
                    <a href="online-class.php" class="d-block nav-link">
                        <span class="nav-text">Online Class</span>
                    </a>
                    <div href="academy.php" id="expand-menu" class="d-block nav-link has-sublink">
                        <span class="nav-text">Academy</span>
                    </div>
                    <div class="sublink-cover">
                       <a href="school-activity.php" class="sublink">School Activity</a>
                        <a href="art-work.php" class="sublink">Art Work</a>
                        <a href="lab.php" class="sublink">Labs</a>
                        <a href="club.php" class="sublink">Clubs</a>
                        <a href="class-activity.php" class="sublink">Class Activity</a>
                        <a href="events.php" class="sublink">Events</a>
                    </div>
                    <a href="gallery.php" class="d-block nav-link">
                        <span class="nav-text">Gallery</span>
                    </a>
                    <a href="our-staff.php" class="d-block nav-link">
                        <span class="nav-text">Our Staff</span>
                    </a>
                    <a href="contact.php" class="d-block nav-link">
                        <span class="nav-text">Contact</span>
                    </a>
                    <div class="mobile-btn">
                        <a href="" class="btn log-in">Log In</a>
                        <!-- <a href="" class="btn register">Register</a> -->
                    </div>
                </nav>
            </div>
        </div>
    </header>