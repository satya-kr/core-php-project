<?php
include("../includes/conn.php");

if (isset( $_POST[ 'add_student' ] )) {

    $first_name = $_POST[ 'first_name' ];
    $last_name = $_POST[ 'last_name' ];
    $fathers_name = $_POST[ 'fathers_name' ];
    $mothers_name = $_POST[ 'mothers_name' ];
    $email_address = $_POST[ 'email_address' ];
    $mobile_no = $_POST[ 'mobile_no' ];
    $student_address = $_POST[ 'student_address' ];
    $class_name = $_POST[ 'class_name' ];
    $student_section = $_POST[ 'student_section' ];
    $student_roll_no = $_POST[ 'student_roll_no' ];
   
//    $student_name = strtolower($first_name.$last_name);
//    $new_str = str_replace(' ', '', $student_name);
//    $username = substr($new_str,0,6);
    $username = 'students';
    $pass = rand();
    
    $sql = "insert into peters_student( `student_first_name`, `student_last_name`, `student_fathers_name`, `student_mothers_name`,  `student_email_address`, `student_phone_no`, `student_address`, `student_class`, `student_section`, `student_roll_no`, `student_username`, `student_password`, `student_create_date`, `student_status`, `login_type`) VALUES('".$first_name."', '".$last_name."', '".$fathers_name."', '".$mothers_name."',  '".$email_address."', '".$mobile_no."', '".$student_address."', '".$class_name."', '".$student_section."', '".$student_roll_no."', '".$username."', '".$pass."', '".date('Y-m-d')."', '1', 'students')";
    //echo $sql;
    //exit;
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      $mailbody="";
      $mailbody=$mailbody."<table width=\"97%\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">";
      $mailbody=$mailbody."<tr><td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\"><strong>Student Name : </strong></td>";
      $mailbody=$mailbody."<td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\">".$first_name.'  '.$last_name."</td></tr>";
      $mailbody=$mailbody."<tr><td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\"><strong>Email Id : </strong></td>";
      $mailbody=$mailbody."<td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\">".$email_address."</td></tr>";
      $mailbody=$mailbody."<tr><td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\"><strong>Mobile No. : </strong></td>";
      $mailbody=$mailbody."<td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\">".$mobile_no."</td></tr>";
      $mailbody=$mailbody."<tr><td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\"><strong>Username : </strong></td>";
      $mailbody=$mailbody."<td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\">".$username."</td></tr>";
      $mailbody=$mailbody."<tr><td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\"><strong>Password : </strong></td>";
      $mailbody=$mailbody."<td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\">".$pass."</td></tr></table>";
  
      $email_id = "himangshu.zomnor@gmail.com";
      $cheaders = "From: <".$email_id.">\n";
      $cheaders .= "MIME-Version: 1.0\n";
      $cheaders .= "Content-type: text/html; charset=iso-8859-1";
      $recipient = ".$email_address.";
      $subject="Student Create Successfully";
      mail($recipient, $subject, $mailbody , $cheaders);

      header( "location:view_student.php" );
    } else {
      header( "location:add_student.php?error=1" );
    }
}

if (isset( $_POST[ 'edit_class' ] )) {

    $edit_id = $_POST[ 'edit_id' ];
    $first_name = $_POST[ 'first_name' ];
    $last_name = $_POST[ 'last_name' ];
    $fathers_name = $_POST[ 'fathers_name' ];
    $mothers_name = $_POST[ 'mothers_name' ];
    $email_address = $_POST[ 'email_address' ];
    $mobile_no = $_POST[ 'mobile_no' ];
    $student_address = $_POST[ 'student_address' ];
    $class_name = $_POST[ 'class_name' ];
    $student_section = $_POST[ 'student_section' ];
    $student_roll_no = $_POST[ 'student_roll_no' ];
    
    $sql= "update peters_student set student_first_name='".$first_name."', student_last_name='".$last_name."', student_fathers_name='".$fathers_name."', student_mothers_name='".$mothers_name."', student_email_address='".$email_address."', student_phone_no='".$mobile_no."', student_address='".$student_address."', student_class='".$class_name."', student_section='".$student_section."', student_roll_no='".$student_roll_no."' where student_id='".$edit_id."' ";
    
    //echo $sql;
    //exit;
    
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:view_student.php?succ=1" );
    } else {
      header( "location:add_student.php?error=1" );
    }
}



?>