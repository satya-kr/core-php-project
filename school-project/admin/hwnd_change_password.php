<?php
include("../includes/conn.php");

if (isset( $_POST[ 'change_pass' ] )) {

    $username = $_POST[ 'user_admin' ];
    $old_password = $_POST[ 'old_password' ];
    $new_password = $_POST[ 'new_password' ];
    $admin_id = $_POST[ 'admin_id' ];
   
    
    
    $sql= "update peters_admin set admin_password='".$new_password."' where admin_id='".$admin_id."' and admin_username='".$username."' and  admin_password='".$old_password."' and login_type='admin' ";
    
   // echo $sql;
 //   exit;
    
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:change_password_admin.php?s=1" );
    } else {
      header( "location:change_password_admin.php?e=1" );
    }
}





?>