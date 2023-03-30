<?php
include("../includes/conn.php");

if (isset( $_POST[ 'add_teacher' ] )) {

    $teacher_name = $_POST[ 'teacher_name' ];
    $class_name = implode(',',$_POST[ 'class_name' ]);
   // $subject_name = implode(',',$_POST[ 'subject_name' ]);
    $email_address = $_POST[ 'email_address' ];
    $mobile_no = $_POST[ 'mobile_no' ];
   
//    $teacher_name = strtolower($teacher_name);
//    $new_str = str_replace(' ', '', $teacher_name);
//    $username = substr($new_str,0,6);
    $username = 'teachers';
    $pass = rand();
    
    $sql = "insert into peters_teachers(`teachers_name`,  `teachers_class`, `teachers_email_id`, `teachers_phone_no`, `teachers_username`, `teachers_password`, `teachers_create_date`, `teachers_status`, `login_type`) VALUES('".$teacher_name."','".$class_name."','".$email_address."','".$mobile_no."','".$username."','".$pass."','".date('Y-m-d')."','1','teachers')";
   // echo  $sql;
  //  exit;
    $query = mysqli_query($conn, $sql);
    if($query)
    {

    $mailbody="";
    $mailbody=$mailbody."<table width=\"97%\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">";
    $mailbody=$mailbody."<tr><td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\"><strong>Teacher Name : </strong></td>";
    $mailbody=$mailbody."<td style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; line-height:16px;\">".$teacher_name."</td></tr>";
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
    $subject="Teachers Create Successfully";
    mail($recipient, $subject, $mailbody , $cheaders);

      header( "location:view_teachers.php" );
    } else {
      header( "location:add_teachers.php?error=1" );
    }
}

if (isset( $_POST[ 'edit_teacher' ] )) {

    $edit_id = $_POST[ 'edit_id' ];
    $teacher_name = $_POST[ 'teacher_name' ];
    $class_name = implode(',',$_POST[ 'class_name' ]);
   // $subject_name = implode(',',$_POST[ 'subject_name' ]);
    $email_address = $_POST[ 'email_address' ];
    $mobile_no = $_POST[ 'mobile_no' ];
    
    
    $sql= "update peters_teachers set teachers_name='".$teacher_name."', teachers_class='".$class_name."',teachers_email_id='".$email_address."',teachers_phone_no='".$mobile_no."' where teachers_id='".$edit_id."' ";
    
   // echo $sql;
   // exit;
    
    $query = mysqli_query($conn, $sql);
    if($query)
    {
      header( "location:view_teachers.php?succ=1" );
    } else {
      header( "location:add_teachers.php?error=1" );
    }
}



?>