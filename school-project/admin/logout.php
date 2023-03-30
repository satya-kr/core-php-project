<?php
    session_start();
    unset($_SESSION["login_username"]);
    unset($_SESSION["login_type"]);
    unset($_SESSION["login_id"]);
    unset($_SESSION["login"]);
    header("Location:index.php");
?>