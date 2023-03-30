<?php  
    include("common/header.php");  
    if($_SESSION[ "login" ]=='yes' && $_SESSION[ "login_type" ]=='teachers') { 
?>
<body>
<div class="main-wrapper">
<?php include("common/left_panel_teachers.php");  ?>
<div class="page-wrapper">
<?php include("common/navbar.php");  ?>
    
<?php
if(isset($_GET['id']))
{
   // echo "hello";
     $edit_id = $_GET['id'];
     $sql = "select * from peters_student where student_id ='".$_GET['id']."'";
     $sql_query = mysqli_query( $conn, $sql );
     $data_query = mysqli_fetch_assoc( $sql_query );
}
    
?>
<div class="page-content">
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div> 
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <div class="" > <span class="input-group-addon bg-transparent"> </span> </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
    
          <!-- <div class="form-group">
          <label for="exampleInputUsername1">Name: <span style=""><?php  echo ucwords($data_query['student_first_name'].' '.$data_query['student_last_name']);?></span></label> -->
          
          <div class="form-group">
            <label for="exampleInputUsername1">Student Name : </label>
            <span style="padding-left:5px;"><?php  echo ucwords($data_query['student_first_name'].' '.$data_query['student_last_name']);?></span>
            </div>
          
          <div class="form-group">
            <label for="exampleInputUsername1">Father's Name : </label>
            <span style="padding-left:5px;"><?php  echo ucwords($data_query['student_fathers_name']);?></span>
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Mother's Name : </label>
            <span style="padding-left:5px;"><?php  echo ucwords($data_query['student_mothers_name']);?></span>
            </div>
            <div class="form-group">
            <label for="exampleInputUsername1">Email Id : </label>
            <span style="padding-left:5px;"><?php  echo $data_query['student_email_address'];?></span>
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Mobile No. : </label>
            <span style="padding-left:5px;"><?php  echo $data_query['student_phone_no'];?></span>
            </div>
            <div class="form-group">
            <label for="exampleInputUsername1">Address : </label>
            <span style="padding-left:5px;"><?php  echo ucfirst($data_query['student_address']);?></span>
            </div>
            <div class="form-group">
            <label for="exampleInputUsername1">Class Name : </label>
            <span style="padding-left:5px;">
            <?php
                  $sql_class = "select * from peters_class_name where class_id='".$data_query['student_class']."'";
                  $query_class = mysqli_query( $conn, $sql_class );
                  $data_class = mysqli_fetch_assoc( $query_class );
                  echo ucfirst($data_class['class_name']);
              ?>
            </span>
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Section : </label>
            <span style="padding-left:5px;"><?php  echo ucfirst($data_query['student_section']);?></span>
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Roll No.: </label>
            <span style="padding-left:5px;"><?php  echo ucfirst($data_query['student_roll_no']);?></span>
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Username: </label>
            <span style="padding-left:5px;"><?php  echo $data_query['student_username'];?></span>
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Password: </label>
            <span style="padding-left:5px;"><?php  echo $data_query['student_password'];?></span>
            </div>
      
          
      
      </div>
    </div>
  </div>
</div>
<?php  
        } else { header("location:index.php");}
         include("common/footer.php"); 
?>
