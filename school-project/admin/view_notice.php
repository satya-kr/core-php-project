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
              <h6 class="card-title">View Notice</h6>
              <div class="table-responsive">
                  <?php  
                  if(isset($_GET['succ']))
                  {
                     if($_GET['succ']==1){
                         ?>
                  <p style="color:green;">Notice data saved successfully.</p>
                  <?php
                     } 
                  }
                 
                  if(isset($_GET['del']))
                  {
                     if($_GET['del']==1){
                         ?>
                  <p style="color:red;">Notice data deleted successfully.</p>
                  <?php
                     } 
                  }
                  ?>
                  
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                       <th>Sl No.</th>
                      <th>Notice Title </th>
                      <th>Notice Date</th>
                      <th>School Name</th>
                      <th>School Address</th>
                      <th>State </th>
                      <th>Pin </th>
                      <th>Country </th>
                      <th>Description </th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "select * from peters_notice order by notice_id desc";
                    $sql_query = mysqli_query( $conn, $sql );
                    $num_query = mysqli_num_rows( $sql_query );
                    if ( $num_query > 0 ) {
                        $i=1;
                      while ( $data_query = mysqli_fetch_assoc( $sql_query ) ) {
                        ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php  echo ucwords($data_query['notice_title']);?></td>
                      <td>
                      <?php  
                      $date=date_create($data_query['notice_date']);
                      echo date_format($date,"d/m/Y");
                     // echo $data_query['notice_date'];
                      
                      ?>
                      </td>
                      <td><?php  echo ucwords($data_query['school_name']);?></td>
                      <td><?php  echo ucwords($data_query['school_address']);?></td>
                      <td><?php  echo ucwords($data_query['school_state']);?></td>
                      <td><?php  echo $data_query['school_pin'];?></td>
                      <td><?php  echo ucwords($data_query['school_country']);?></td>
                      <td><?php  echo substr($data_query['notice_description'],0,15);?></td>

                      <td><a href="add_notice.php?id=<?php echo $data_query['notice_id'];?>"  class="btn btn-primary">Edit</a></td>
                      <td><a href="delete_notice.php?id=<?php echo $data_query['notice_id'];?>" class="btn btn-danger" onclick="return deleletconfig()">Delete</a></td>
                    </tr>
                    <?php
                     $i++;
                    }
                    } else {
                      ?>
                    <tr>
                      <td colspan="4" style="color:red;">No Records Found!</td>
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
