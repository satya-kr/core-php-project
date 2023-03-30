<?php
include("../includes/conn.php");

if (isset( $_POST[ 'add_subject' ] )) {

    $class_id = $_POST[ 'class_id' ];
    $subject_name = $_POST[ 'subject_name' ];
    $sql = "INSERT INTO `peters_subject`(`class_id`, `subject_name`, `subject_create_date`) VALUES('".$class_id."','".$subject_name."','".date('Y-m-d')."')";
    
   // echo $sql;
   // exit;
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:view_subject.php" );
    } else {
      header( "location:add_subject.php?error=1" );
    }
}

if (isset( $_POST[ 'edit_subject' ] )) {

    $edit_id = $_POST[ 'edit_id' ];
    
    $class_id = $_POST[ 'class_id' ];
    $subject_name = $_POST[ 'subject_name' ];
    
    $sql= "update peters_subject set class_id='".$class_id."', subject_name='".$subject_name."' where subject_id='".$edit_id."' ";
    
  //  echo $sql;
   // exit;
    
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:view_subject.php?succ=1" );
    } else {
      header( "location:add_subject.php?error=1" );
    }
}



?>