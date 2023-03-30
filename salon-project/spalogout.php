<?php
session_start();

if (!isset($_SESSION['spa_user'])) {
 header("Location: spalogin.php");
}
 session_destroy();
 unset($_SESSION['spa_user']);

 if(isset($_COOKIE['spa_user'])):
        setcookie('spa_user', '', time()-311049999, '/');
    endif;
 header("Location: spalogin.php");
?>
