<?php
include("../includes/conn.php");

if (isset( $_REQUEST[ 'assign_teacher' ] )) {

    
   //  $class_name = $_POST[ 'class_name' ];
         
    $teachers_id = $_REQUEST[ 'teachers_id' ];
    $sql = "select * from peters_teachers where teachers_id='".$teachers_id."'";
    $sql_query = mysqli_query( $conn, $sql );
    $data_query = mysqli_fetch_assoc( $sql_query );
      
  
    $teacher_class = explode(',',$data_query['teachers_class']);
    $total_class = count($teacher_class);
    for($a=0; $a<$total_class; $a++)
    {
        $class_id = $teacher_class[$a];
        $subject_name = implode(',',$_POST[ 'subject_names'.$a ]);
        $sql = "insert into peters_teachers_assign_class(teachers_id,class_id,subject_id,create_date) VALUES('".$teachers_id."','".$class_id."','".$subject_name."','".date('Y-m-d')."')";
      //  echo $sql;
       // exit;
        $query = mysqli_query($conn, $sql);
    }
   
    header( "location:view_teachers.php?ass=1" );
    

}






?>