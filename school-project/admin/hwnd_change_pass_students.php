<?php
include("../includes/conn.php");

if (isset( $_POST[ 'change_pass' ] )) {

    $username = $_POST[ 'user_student' ];
    $old_password = $_POST[ 'old_password' ];
    $new_password = $_POST[ 'new_password' ];
    $student_id = $_POST[ 'student_id' ];
   
    
    
    $sql= "update peters_student set student_password='".$new_password."' where student_id ='".$student_id."' and student_username='".$username."' and  student_password='".$old_password."' and login_type='students' ";
    
    
    
  //  echo $sql;
 //   exit;
    
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:change_password_students.php?s=1" );
    } else {
      header( "location:change_password_students.php?e=1" );
    }
}





?>