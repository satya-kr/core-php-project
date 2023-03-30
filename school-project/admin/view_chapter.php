<?php  
    include("common/header.php");  
    if($_SESSION[ "login" ]=='yes' && $_SESSION[ "login_type" ]=='students') { 
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
  <?php include("common/left_panel_students.php");  ?>
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
              <h6 class="card-title">View Chapter</h6>
              <div class="table-responsive">
                    
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                       <th>Sl No.</th>
                      <th>Chapter No.</th>
                        <th>Chapter Name</th>
                      <th>View Documents</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql_documents = "select * from peters_documents where class_id ='".$_GET['c']."' and subject_id='".$_GET['s']."' and `section` = '". $_GET['se']."' group by chapter_no";
                   // echo    $sql_documents;                                                      
                    $query_documents = mysqli_query($conn,$sql_documents);
                    $num_documents = mysqli_num_rows( $query_documents );                                                          
                    if ( $num_documents > 0 ) {
                        $i=1;
                      while ( $data_documents = mysqli_fetch_assoc($query_documents) ) {
                        ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php  echo ucfirst($data_documents['chapter_no']);?></td>
                        <td><?php  echo ucfirst($data_documents['chapter_title']);?></td>
                      <td><a href="view_documents.php?s=<?php echo $data_documents['subject_id']; ?>&c=<?php echo $data_documents['class_id']; ?>&se=<?php echo $data_documents['section']; ?>"  class="btn btn-primary">View</a></td>
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
