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
            
            <?php
                $sql_documents = "select * from peters_documents where class_id ='".$_GET['c']."' and subject_id='".$_GET['s']."' and `section` = '". $_GET['se']."'";
                // echo    $sql_documents;                                                      
                $query_documents = mysqli_query($conn,$sql_documents);
                $data_documents = mysqli_fetch_assoc($query_documents);
                if($query_documents->num_rows >0){
            ?>
            
          <div class="card">
            <div class="card-body">
                <h5 class="text-center mb-3 mt-4"><span style="font-weight:300">Chapter No</span>: <?php  echo $data_documents['chapter_no'];?></h5>
                <h4 class="text-center mt-3 mb-4"><span style="font-weight:300">Chapter Name</span>: <?php echo strtoupper($data_documents['chapter_title']);?></h4>
                <div class="container">  
                  <div class="row">
                      
            <?php
                $sql_documents2 = "select * from peters_documents where class_id ='".$_GET['c']."' and subject_id='".$_GET['s']."' and `section` = '". $_GET['se']."'";
                // echo    $sql_documents;                                                      
                $query_documents2 = mysqli_query($conn,$sql_documents2);
                $i=1;    
                $num_documents2 = mysqli_num_rows( $query_documents2 );  
                if($num_documents2 >0)
                {
                while($data_documents2 = mysqli_fetch_assoc($query_documents2))
                {
            ?>  
                <div class="col-md-4 stretch-card grid-margin grid-margin-md-0 doc-x">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="text-center text-uppercase mt-3 mb-4">Document - <?php echo $i; ?></h5>
                      <i data-feather="file-text" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                      <p class="text-muted text-center mb-4 font-weight-light"><?php  echo ucfirst($data_documents2['document_name']);?></p>
                        <!--  <button class="btn btn-success d-block mx-auto mt-4">Downlod</button>-->
                        <a href="<?php echo $site_url; ?>admin/uploaded_docs/<?php echo $data_documents2['document_name'];?>" target="_blank" class="btn btn-success d-block mx-auto mt-4" style="width:40%">Download</a>
                    </div>
                  </div>
                </div>

               <?php
                $i++; 
                }
              
            } else {
                ?>
             <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                  <div class="card">
                    <div class="card-body">
                     <h6 class="text-muted text-center mb-4 font-weight-normal">Document Not Found!</h6>   
                    </div>
                  </div>
                </div>
            <?php
            }
          }
            ?>
                      
                      
<!--
                    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="text-center text-uppercase mt-3 mb-4 font-weight-light">Business</h4>
                          <i data-feather="gift" class="text-success icon-xxl d-block mx-auto my-3"></i>
                          <h3 class="text-center font-weight-light">$70</h3>
                          <p class="text-muted text-center mb-4 font-weight-light">per month</p>
                          <h6 class="text-muted text-center mb-4 font-weight-normal">Up to 75 units</h6>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-danger mr-2"></i>
                            <p>Accounting dashboard</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-danger mr-2"></i>
                            <p>Invoicing</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-danger mr-2"></i>
                            <p>Online payments</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-danger mr-2"></i>
                            <p>Branded website</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-danger mr-2"></i>
                            <p class="text-muted">Dedicated account manager</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="x" class="icon-md text-light mr-2"></i>
                            <p class="text-muted">Premium apps</p>
                          </div>
                          <button class="btn btn-success d-block mx-auto mt-4">Star free trial</button>
                        </div>
                      </div>
                    </div>
-->
<!--
                    <div class="col-md-4 stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="text-center text-uppercase mt-3 mb-4">Professional</h5>
                          <i data-feather="briefcase" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                          <h3 class="text-center font-weight-light">$250</h3>
                          <p class="text-muted text-center mb-4 font-weight-light">per month</p>
                          <h6 class="text-muted text-center mb-4 font-weight-normal">Up to 300 units</h6>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                            <p>Accounting dashboard</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                            <p>Invoicing</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                            <p>Online payments</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                            <p>Branded website</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                            <p>Dedicated account manager</p>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <i data-feather="check" class="icon-md text-primary mr-2"></i>
                            <p>Premium apps</p>
                          </div>
                          <button class="btn btn-primary d-block mx-auto mt-4">Star free trial</button>
                        </div>
                      </div>
                    </div>
-->

                  </div>
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
