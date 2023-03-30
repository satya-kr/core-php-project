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
              <h6 class="card-title">View Subject</h6>
              <div class="table-responsive">
                  <?php  
                  if(isset($_GET['succ']))
                  {
                     if($_GET['succ']==1){
                         ?>
                  <p style="color:green;">Subject data saved successfully.</p>
                  <?php
                     } 
                  }
                 
                  if(isset($_GET['del']))
                  {
                     if($_GET['del']==1){
                         ?>
                  <p style="color:red;">Subject data deleted successfully.</p>
                  <?php
                     } 
                  }
                  ?>
                  
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                       <th>Sl No.</th>
                      <th>Class Name</th>
                      <th>Subject Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "select * from peters_subject";
                    $sql_query = mysqli_query( $conn, $sql );
                    $num_query = mysqli_num_rows( $sql_query );
                    if ( $num_query > 0 ) {
                        $i=1;
                      while ( $data_query = mysqli_fetch_assoc( $sql_query ) ) {
                            $sql_class = "select * from peters_class_name where class_id='".$data_query['class_id']."'";
                            $sql_query_class = mysqli_query( $conn, $sql_class );
                            $data_query_class = mysqli_fetch_assoc( $sql_query_class )
                        ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php  echo ucfirst($data_query_class['class_name']);?></td>
                        <td><?php  echo ucfirst($data_query['subject_name']);?></td>
                      <td><a href="add_subject.php?id=<?php echo $data_query['subject_id'];?>"  class="btn btn-primary">Edit</a></td>
                      <td><a href="delete_subject.php?id=<?php echo $data_query['subject_id'];?>" class="btn btn-danger" onclick="return deleletconfig()">Delete</a></td>
                    </tr>
                    <?php
                     $i++;
                    }
                    } else {
                      ?>
                    <tr>
                      <td colspan="5" style="color:red;">No Records Found!</td>
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
