<?php
session_start();

if (!isset($_SESSION['aduser'])) {
 header("Location: login.php");
}
 session_destroy();
 unset($_SESSION['aduser']);

 if(isset($_COOKIE['aduser'])):
        setcookie('aduser', '', time()-311049999, '/');
    endif;
 header("Location: login.php");
?>
