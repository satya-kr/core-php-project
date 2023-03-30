<?php
session_start();

if (!isset($_SESSION['user'])) {
 header("Location: userlogin.php");
}
 session_destroy();
 unset($_SESSION['user']);

 if(isset($_COOKIE['user'])):
        setcookie('user', '', time()-311049999, '/');
    endif;
 header("Location: userlogin.php");
?>
