<?php
include("../includes/conn.php");

if (isset( $_REQUEST[ 'assign_teacher' ] )) {
         
    $teachers_id = $_REQUEST[ 'teachers_id' ];
    $sql = "select * from peters_teachers where teachers_id='".$teachers_id."'";
    $sql_query = mysqli_query( $conn, $sql );
   // $num_query = mysqli_num_rows();
    $data_query = mysqli_fetch_assoc( $sql_query );
     
    $delete_sql = "delete from peters_teachers_assign_class where teachers_id='".$teachers_id."' ";
    $delete_query = mysqli_query($conn,$delete_sql);
  
    $teacher_class = explode(',',$data_query['teachers_class']);
    $total_class = count($teacher_class);
    for($a=0; $a<$total_class; $a++)
    {
        $class_id = $teacher_class[$a];
        $section_a_subject_name = implode(',',$_POST[ 'section_a_subject_names'.$a ]);

        $section_b_subject_name = implode(',',$_POST[ 'section_b_subject_names'.$a ]);


        // print '<pre>';
        // print_r( $section_a_subject_name); 
        // print_r( $section_b_subject_name); 
        // exit;

        $sql = "insert into peters_teachers_assign_class(teachers_id,class_id,sec_a_subject_id,sec_b_subject_id,create_date) VALUES('".$teachers_id."','".$class_id."','".$section_a_subject_name."', '".$section_b_subject_name."','".date('Y-m-d')."')";
        $query = mysqli_query($conn, $sql);
    }
   
    header( "location:view_teachers.php?ass=1" );

}




    
    
    
    
    
    
/*    $subject_name = implode(',',$_POST[ 'subject_names1' ]);
   // echo $subject_name;
    exit;
 
    $teachers_id = $_REQUEST[ 'teachers_id' ];
    $sql = "select * from peters_teachers_assign_class where teachers_id='".$teachers_id."'";
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
*/








?>