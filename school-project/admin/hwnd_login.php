<?php
include("../includes/conn.php");

if (isset( $_POST[ 'login_submit' ] )) {

  $username = $_POST[ 'username' ];
  $user_pass = $_POST[ 'user_pass' ];
  $login_type = $_POST[ 'admin' ];

// echo $login_type;
// exit;

// Start script for Admin login
  if($login_type=='Admin')
  {
    $query = "SELECT * FROM `peters_admin` WHERE `admin_username`='$username' AND `admin_password`='$user_pass' AND `login_type`='Admin'  ";
    $queryData = mysqli_query( $conn, $query );
    $numRow = mysqli_num_rows( $queryData );
    $dataArray = mysqli_fetch_assoc( $queryData );
    if ( $numRow == 1 ) {
        $_SESSION[ "login_username" ] = $dataArray[ 'admin_username' ];
        $_SESSION[ "login_type" ] = $dataArray[ 'login_type' ];
        $_SESSION[ "login_id" ] = $dataArray[ 'admin_id' ];
        $_SESSION[ "login" ] = "yes";
        header( "location:dashboard_admin.php" );
    } else {
        header( "location:index.php?error=1" );
    }
}
// End script for Admin login

// Start script for teachers login
if($login_type=='Teachers')
{
  $query = "SELECT * FROM `peters_teachers` WHERE `teachers_username`='$username' AND `teachers_password`='$user_pass' AND `login_type`='Teachers'  ";
  //echo $query;
  //exit;
  $queryData = mysqli_query( $conn, $query );
  $numRow = mysqli_num_rows( $queryData );
  $dataArray = mysqli_fetch_assoc( $queryData );


  if ( $numRow == 1 ) {
     // echo $dataArray['teachers_username'];
     // exit;
      $_SESSION[ "login_username" ] = $dataArray['teachers_username'];
      $_SESSION[ "login_type" ] = $dataArray['login_type'];
      $_SESSION[ "login_id" ] = $dataArray['teachers_id'];
      $_SESSION[ "login" ] = "yes";
      header( "location:dashboard_teachers.php" );
  } else {
      header( "location:index.php?error=1" );
  }
}
// End script for teachers login

// Start script for students login
if($login_type=='Students')
{
  $query = "SELECT * FROM `peters_student` WHERE `student_username`='$username' AND `student_password`='$user_pass' AND `login_type`='Students'  ";
  $queryData = mysqli_query( $conn, $query );
  $numRow = mysqli_num_rows( $queryData );
  $dataArray = mysqli_fetch_assoc( $queryData );
  if ( $numRow == 1 ) {
      $_SESSION[ "login_username" ] = $dataArray[ 'student_username' ];
      $_SESSION[ "login_type" ] = $dataArray[ 'login_type' ];
      $_SESSION[ "login_id" ] = $dataArray[ 'student_id' ];
      $_SESSION[ "login" ] = "yes";
      header( "location:dashboard_students.php" );
  } else {
      header( "location:index.php?error=1" );
  }
}
// End script for students login









}



?>