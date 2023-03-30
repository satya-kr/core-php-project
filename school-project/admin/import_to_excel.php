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
<div class="card-body">
<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">

				<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							<div class="control-label">
								<label>CSV/Excel File:<span style="color:red;">*</span></label>
							</div>
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large" required>
							</div>
						</div>
						
						<div class="control-group" style="margin-top:20px;">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
                </div>
<!-- End script for Export to excel -->

          </div>
        </div>
      </div>
      <!-- row --> 
    </div>
<?php  
        } else { header("location:index.php");}
         include("common/footer.php"); 
?>
