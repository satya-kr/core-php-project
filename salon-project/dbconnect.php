<?php

 $DBhost = "localhost";
 $DBuser = "pvtest_salonuser";
 $DBpass = "Jb,D,My[-0~r";
 $DBname = "pvtest_salon";

 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);

    if ($DBcon->connect_errno) {
        die("ERROR : -> ".$DBcon->connect_error);
    }

?>
