<?php
include("../includes/conn.php");

$i = 0;
$countfiles = 0;
if (isset($_POST['add_docs'])) {
    $date = date('Y-m-d');
    $c_no = $_POST['chapter'];
    $c_title =  $_POST['title'];
    $section =  $_POST['section'];

    $documents_id = $_REQUEST['documents_id'];
    $subject_id = $_REQUEST['subject_id'];
    $teachers_id = $_REQUEST['teachers_id'];
    $class_id = $_REQUEST['class_id'];

    $sql_doc = "select * from `peters_documents` where documents_id= '$documents_id' and `teachers_id` = '$teachers_id' and `subject_id` = '$subject_id' and `class_id` = '$class_id'";
    $run_doc = mysqli_query($conn, $sql_doc);
    $data_doc = mysqli_fetch_assoc($run_doc);

    $sql_class = "select * from peters_class_name where class_id='" . $class_id . "'";
    $qry = $conn->query($sql_class);
    $qry_data = $qry->fetch_assoc();

    $sql = "select * from peters_teachers_assign_class where teachers_id = '$teachers_id' and class_id = '$class_id'";
    $sql_query = mysqli_query($conn, $sql);
    $num_query = mysqli_num_rows($sql_query);

    $sql_subject = "select * from peters_subject where subject_id ='" . $subject_id . "'";
    $sql_query_subject = mysqli_query($conn, $sql_subject);
    $sub_data = mysqli_fetch_assoc($sql_query_subject);

   // $countfiles = $file = $_FILES['docs']['name'];

    $filename = $_FILES['docs']['name'];
    $ext = pathinfo($filename);

    $filename = rand(111, 999) . '-' . $qry_data['class_name'] . '-' . $sub_data['subject_name'].'.'. $ext['extension'];
   //$filename = rand(111, 999) . '-' . $qry_data['class_name'] . '-' . $sub_data['subject_name'].'.'. $ext;
   // echo $filename;
  //exit;

    move_uploaded_file($_FILES['docs']['tmp_name'], 'uploaded_docs/' . $filename);

    $query2 = "update peters_documents set chapter_no='".$c_no."',chapter_title='".$c_title."',document_name='".$filename."' where documents_id='".$documents_id."'";
    $queryData2 = mysqli_query($conn, $query2);

    header("location:add_chapters.php?s=$subject_id&c=$class_id&se=$section");
}


?>
<!-- row -->


