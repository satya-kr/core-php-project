<?php
include("../includes/conn.php");

if (isset( $_POST[ 'add_notice' ] )) {

    $notice_title = $_POST[ 'notice_title' ];
    $notice_date = $_POST[ 'notice_date' ];
    $school_name = $_POST[ 'school_name' ];
    $school_address = $_POST[ 'school_address' ];
    $school_state = $_POST[ 'school_state' ];
    $school_pin = $_POST[ 'school_pin' ];
    $school_country = $_POST[ 'school_country' ];
    $notice_description = $_POST[ 'notice_description' ];

    $sql = "insert into peters_notice( `notice_title`, `notice_date`, `school_name`, `school_address`, `school_state`, `school_pin`, `school_country`, `notice_description`, `create_date`) VALUES('".$notice_title."','".$notice_date."','".$school_name."','".$school_address."','".$school_state."','".$school_pin."','".$school_country."','".$notice_description."','".date('Y-m-d')."')";

    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:view_notice.php" );
    } else {
      header( "location:add_notice.php?error=1" );
    }
}

if (isset( $_POST[ 'edit_notice' ] )) {

    $edit_id = $_POST[ 'edit_id' ];
    $notice_title = $_POST[ 'notice_title' ];
    $notice_date = $_POST[ 'notice_date' ];
    $school_name = $_POST[ 'school_name' ];
    $school_address = $_POST[ 'school_address' ];
    $school_state = $_POST[ 'school_state' ];
    $school_pin = $_POST[ 'school_pin' ];
    $school_country = $_POST[ 'school_country' ];
    $notice_description = $_POST[ 'notice_description' ];
   // $sql = "insert into peters_class_name(class_name,class_create_date) VALUES('".$class_name."','".date('Y-m-d')."')";
    
    $sql= "update peters_notice set notice_title='".$notice_title."', notice_date='".$notice_date."',school_name='".$school_name."',school_address='".$school_address."',school_state='".$school_state."',school_pin='".$school_pin."',school_country='".$school_country."',notice_description='".$notice_description."' where notice_id ='".$edit_id."' ";

    //echo $sql;
    //exit;
    
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:view_notice.php?succ=1" );
    } else {
      header( "location:add_notice.php?error=1" );
    }
}



?>