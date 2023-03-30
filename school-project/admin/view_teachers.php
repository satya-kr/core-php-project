<?php  
    include("common/header.php");  
    if($_SESSION[ "login" ]=='yes' && $_SESSION[ "login_type" ]=='admin') { 
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
  <?php include("common/left_panel_admin.php");  ?>
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
              <h6 class="card-title">View Teachers</h6>
              <div class="table-responsive">
                  <?php  
                  if(isset($_GET['succ']))
                  {
                     if($_GET['succ']==1){
                         ?>
                  <p style="color:green;">Teachers data saved successfully.</p>
                  <?php
                     } 
                  }
                  if(isset($_GET['ass']))
                  {
                     if($_GET['ass']==1){
                         ?>
                  <p style="color:green;">Teachers subject assigned successfully.</p>
                  <?php
                     } 
                  }
                 
                  if(isset($_GET['del']))
                  {
                     if($_GET['del']==1){
                         ?>
                  <p style="color:red;">Teachers data deleted successfully.</p>
                  <?php
                     } 
                  }
                  ?>
                  
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Email Id</th>
                        <th>Mobile No.</th>
                        <th>View Subject</th>
                        <th>Edit Assign Subject</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "select * from peters_teachers";
                    $sql_query = mysqli_query( $conn, $sql );
                    $num_query = mysqli_num_rows( $sql_query );
                    if ( $num_query > 0 ) {
                        $i=1;
                      while ( $data_query = mysqli_fetch_assoc( $sql_query ) ) {
                        ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php  echo ucwords($data_query['teachers_name']);?></td>
                      <td>
                          <?php 
                              $teacher_class = explode(',',$data_query['teachers_class']);
                              $total_class = count($teacher_class);
                              for($a=0; $a<$total_class; $a++)
                              {
                                  $class_id = $teacher_class[$a];
                                  $sql_class = "select * from peters_class_name where class_id='".$class_id."'";
                                  $sql_query_class = mysqli_query( $conn, $sql_class );
                                  $data_query_class = mysqli_fetch_assoc($sql_query_class);
                                  echo $data_query_class['class_name'].'&nbsp;&nbsp;';
                              }
                          ?>
                        </td>
                      <td><?php  echo $data_query['teachers_email_id'];?></td>
                      <td><?php  echo $data_query['teachers_phone_no'];?></td>


                      <td><a href="view_subjects.php?id=<?php echo $data_query['teachers_id'];?>"  class="btn btn-success">View</a></td>

                        <!-- <td><a href="assign_teachers.php?id=<?php echo $data_query['teachers_id'];?>"  class="btn btn-success">View Subject</a></td> -->
                        <?php
                            $sql_assign = "select * from peters_teachers_assign_class where teachers_id='".$data_query['teachers_id']."'";
                            $sql_query_assign = mysqli_query( $conn, $sql_assign );
                            $num_query_assign = mysqli_num_rows($sql_query_assign);
                          if($num_query_assign > 0)
                          {
                          ?>
                        <td><a href="edit_assign_teachers.php?id=<?php echo $data_query['teachers_id'];?>"  class="btn btn-primary"> Edit  </a></td>
                        <?php
                          } else {
                              ?>
                        <td><a href="edit_assign_teachers.php?id=<?php echo $data_query['teachers_id'];?>"  class="btn btn-danger">Not Assign </a></td>
                        <?php
                          }
                        ?>
                      <td><a href="add_teachers.php?id=<?php echo $data_query['teachers_id'];?>"  class="btn btn-primary">Edit</a></td>
                      <td><a href="delete_teachers.php?id=<?php echo $data_query['teachers_id'];?>" class="btn btn-danger" onclick="return deleletconfig()">Delete</a></td>
                    </tr>
                    <?php
                     $i++;
                    }
                    } else {
                      ?>
                    <tr>
                      <td colspan="8" style="color:red;">No Records Found!</td>
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
