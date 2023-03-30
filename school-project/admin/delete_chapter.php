<?php
include("../includes/conn.php");
if(isset($_REQUEST['id']))
{
    $documents_id =  $_REQUEST['id'];
    $subject_id = $_REQUEST['s'];
    $class_id = $_REQUEST['c'];
    
    $sql = "select document_name from peters_documents where documents_id='".$documents_id."'";
    $select=mysqli_query($conn,$sql);
    $image=mysqli_fetch_assoc($select);
    @unlink('./uploaded_docs/'.$image['document_name']);
        
    $sql_del  = "DELETE FROM peters_documents WHERE documents_id= '".$documents_id."'";

   // echo $sql_del;
  //  exit;
    $run_del = mysqli_query($conn,$sql_del);
    
    if($run_del)
    {
       // header("location:view_logo.php?d=1");
       header("location:add_chapters.php?s=$subject_id&c=$class_id");
    } 
}



?>