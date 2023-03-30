<?php  
    include("common/header.php");  
    if($_SESSION[ "login" ]=='yes' && $_SESSION[ "login_type" ]=='teachers') { 
?>
<script>
    function deleletconfig(){

    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
       alert ("record deleted")
    }else{
        alert("Record Not Deleted")
    }
    return del;
    }
</script>
<body>
<div class="main-wrapper">
<?php include("common/left_panel_teachers.php");  ?>
  <div class="page-wrapper">
    <?php include("common/navbar.php");  ?>
    <div class="page-content">
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div> </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
          <div class="" > <span class="input-group-addon bg-transparent"> </span> </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">View Student</h6>
              <div class="table-responsive">
                  <?php  
                  if(isset($_GET['succ']))
                  {
                     if($_GET['succ']==1){
                         ?>
                  <p style="color:green;">Student data saved successfully.</p>
                  <?php
                     } 
                  }
                 
                  if(isset($_GET['del']))
                  {
                     if($_GET['del']==1){
                         ?>
                  <p style="color:red;">Student data deleted successfully.</p>
                  <?php
                     } 
                  }
                  ?>
                  



          
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Roll No.</th>
                        <th>View Student Details</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                      $sql_tech2 ="select * from peters_teachers_assign_class where teachers_id='".$_SESSION[ "login_id" ]."'"; 
                     // echo $sql_tech2;
                      $run_rech2 = mysqli_query($conn,$sql_tech2); 
                      $num_teachers2 = mysqli_num_rows($run_rech2);
                      if($num_teachers2>0)
                      {
                      while($data_tech2 = mysqli_fetch_assoc( $run_rech2))
                      {
                        $class[] = $data_tech2['class_id'];
                      }
                      // echo '<br>';
                      // print '<pre>';
                      // print_r($class);
                      $explode_class_id = implode(',',$class);
                     // echo $explode_class_id;
                      $sql_tech ="select * from peters_teachers_assign_class where teachers_id='".$_SESSION[ "login_id" ]."'"; 
                      $run_rech = mysqli_query($conn,$sql_tech); 
                     
                      $data_tech = mysqli_fetch_assoc( $run_rech);
                      $class_id =  $data_tech['class_id'];
                      if(!empty($data_tech['sec_a_subject_id'])) { $section_a ='A'; } else { $section_a =''; }
                      if(!empty($data_tech['sec_b_subject_id'])) { $section_b ='B'; } else { $section_b =''; }
              
                 ?>
                    <?php
                    $sql = "select * from peters_student where student_class IN (".$explode_class_id.") and student_section='". $section_a."' or student_class IN (".$explode_class_id.") and  student_section='". $section_b."' order by student_class asc";
                   // echo  $sql;
                    $sql_query = mysqli_query( $conn, $sql );
                    $num_query = mysqli_num_rows( $sql_query );
                   // if ( $num_query > 0 ) {
                        $i=1;
                      while ( $data_query = mysqli_fetch_assoc( $sql_query ) ) {
                        ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php  echo ucwords($data_query['student_first_name'].' '.$data_query['student_last_name']);?></td>
                        <td><?php  echo ucwords($data_query['student_fathers_name']);?></td>
                        <td>
                            <?php
                                $sql_class = "select * from peters_class_name where class_id='".$data_query['student_class']."'";
                                $query_class = mysqli_query( $conn, $sql_class );
                                $data_class = mysqli_fetch_assoc( $query_class );
                                echo ucfirst($data_class['class_name']);
                            ?>
                        </td>
                        <td><?php  echo ucfirst($data_query['student_section']);?></td>
                        <td><?php  echo ucfirst($data_query['student_roll_no']);?></td>
                        <td><a href="view_student_details.php?id=<?php echo $data_query['student_id'];?>"  class="btn btn-primary">View</a></td>
                        <td><a href="add_student_teachers.php?id=<?php echo $data_query['student_id'];?>"  class="btn btn-primary">Edit</a></td>
                        <td><a href="delete_student_teachers.php?id=<?php echo $data_query['student_id'];?>" class="btn btn-danger" onclick="return deleletconfig()">Delete</a></td>
                    </tr>
                    <?php
                     $i++;
                    }
                    } else {
                      ?>
                    <tr>
                      <td colspan="11" style="color:red;">No Records Found!</td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- row --> 
    </div>
<?php  
        } else { header("location:index.php");}
         include("common/footer.php"); 
?>
