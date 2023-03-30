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
<!-- Start script for Export to excel -->
<!-- <div class="card-body">
            <form name="class_form" method="post" action="hwnd_export.php" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Choose Class : <span style="color:red;">*</span></label>
                <select name="class_name" required>
                  <option value="">Choose Class </option>
                  <?php
                /*  $sql_class = "select * from peters_class_name";
                  $query_class = mysqli_query( $conn, $sql_class );
                  $num_class = mysqli_num_rows( $query_class );
                  if ( $num_class > 0 ) {
                    while ( $data_class = mysqli_fetch_assoc( $query_class ) ) {
                      ?>
                  <option value="<?php echo $data_class['class_id']; ?>">
                      <?php echo ucfirst($data_class['class_name']); ?></option>
                  <?php
                  }
                }*/
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Section Name:<span style="color:red;">*</span> </label>

                <select name="section_name" required>
                  <option value="">Choose Section</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  </select> 
              </div>
              <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
            </form>
          </div> -->
<!-- End script for Export to excel -->



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
                        <th>Mother's Name</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Roll No.</th>
                        <th>Mobile No.</th>
                        <th>Email Id</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "select * from peters_student";
                    $sql_query = mysqli_query( $conn, $sql );
                    $num_query = mysqli_num_rows( $sql_query );
                    if ( $num_query > 0 ) {
                        $i=1;
                      while ( $data_query = mysqli_fetch_assoc( $sql_query ) ) {
                        ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php  echo ucwords($data_query['student_first_name'].' '.$data_query['student_last_name']);?></td>
                        <td><?php  echo ucwords($data_query['student_fathers_name']);?></td>
                        <td><?php  echo ucwords($data_query['student_mothers_name']);?></td>
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
                        <td><?php  echo ucfirst($data_query['student_phone_no']);?></td>
                        <td><?php  echo ucfirst($data_query['student_email_address']);?></td>
                        <td><?php  echo ucfirst($data_query['student_address']);?></td>
                        <td><a href="add_student.php?id=<?php echo $data_query['student_id'];?>"  class="btn btn-primary">Edit</a></td>
                        <td><a href="delete_student.php?id=<?php echo $data_query['student_id'];?>" class="btn btn-danger" onclick="return deleletconfig()">Delete</a></td>
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
