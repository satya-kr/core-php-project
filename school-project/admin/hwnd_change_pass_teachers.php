<?php
include("../includes/conn.php");

if (isset( $_POST[ 'change_pass' ] )) {

    $username = $_POST[ 'user_teachers' ];
    $old_password = $_POST[ 'old_password' ];
    $new_password = $_POST[ 'new_password' ];
    $teachers_id = $_POST[ 'teachers_id' ];
   
    
    
    $sql= "update peters_teachers set teachers_password='".$new_password."' where teachers_id ='".$teachers_id."' and teachers_username='".$username."' and  teachers_password='".$old_password."' and login_type='teachers' ";
    
  //  echo $sql;
  //  exit;
    
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:change_password_teachers.php?s=1" );
    } else {
      header( "location:change_password_teachers.php?e=1" );
    }
}





?>