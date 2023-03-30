<?php
include("../includes/conn.php");

if (isset( $_POST[ 'add_class' ] )) {

    $class_name = $_POST[ 'class_name' ];
    $sql = "insert into peters_class_name(class_name,class_create_date) VALUES('".$class_name."','".date('Y-m-d')."')";
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:view_class.php" );
    } else {
      header( "location:add_class.php?error=1" );
    }
}

if (isset( $_POST[ 'edit_class' ] )) {

    $edit_id = $_POST[ 'edit_id' ];
    $class_name = $_POST[ 'class_name' ];
   // $sql = "insert into peters_class_name(class_name,class_create_date) VALUES('".$class_name."','".date('Y-m-d')."')";
    
    $sql= "update peters_class_name set class_name='".$class_name."' where class_id='".$edit_id."' ";
    
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:view_class.php?succ=1" );
    } else {
      header( "location:add_class.php?error=1" );
    }
}



?>