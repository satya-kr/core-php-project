<?php  
    include("common/header.php");  
    if($_SESSION[ "login" ]=='yes' && $_SESSION[ "login_type" ]=='admin') { 
?>
<body>
<div class="main-wrapper">
<?php include("common/left_panel_admin.php");  ?>
<div class="page-wrapper">
<?php include("common/navbar.php");  ?>
    
<?php
if(isset($_GET['id']))
{
   // echo "hello";
     $edit_id = $_GET['id']; 
     $sql = "select * from peters_notice where notice_id='".$_GET['id']."'";
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
         <?php
          if(!empty($edit_id))
          {
          ?>
              <h6 class="card-title">Edit Notice</h6>
          <?php
          } else {
          ?>
              <h6 class="card-title">Add Notice</h6>
          <?php
          }
          ?>
        <form name="notice_form" method="post" enctype="multipart/form-data" action="hwnd_notice.php" class="forms-sample">
        <?php
          if(!empty($edit_id))
          {
          ?>
            <div class="form-group">
            <label for="exampleInputUsername1">Notice Title :<span style="color:red;">*</span> </label>
            <input type="text" name="notice_title" class="form-control" id="notice_title" value="<?php echo $data_query['notice_title']; ?>" autocomplete="off" required placeholder="Enter Notice Title">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Notice Date : <span style="color:red;">*</span></label>
            <input type="date" name="notice_date" class="form-control" id="notice_date" value="<?php echo $data_query['notice_date']; ?>" autocomplete="off" required placeholder="Enter Notice Date">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">School Name : <span style="color:red;">*</span></label>
            <input type="text" name="school_name" class="form-control" id="school_name" value="<?php echo $data_query['school_name']; ?>" autocomplete="off" required placeholder="Enter School Name">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">School Address : <span style="color:red;">*</span></label>
            <input type="text" name="school_address" class="form-control" id="school_address" value="<?php echo $data_query['school_address']; ?>" autocomplete="off" required placeholder="Enter School Address">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">State :<span style="color:red;">*</span> </label>
            <input type="text" name="school_state" class="form-control" id="school_state" value="<?php echo $data_query['school_state']; ?>" autocomplete="off" required placeholder="Enter State Name">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Pin :<span style="color:red;">*</span> </label>
            <input type="text" name="school_pin" class="form-control" id="school_pin" maxlength="6" value="<?php echo $data_query['school_pin']; ?>" autocomplete="off" required placeholder="Enter Pin No.">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Country : <span style="color:red;">*</span></label>
            <input type="text" name="school_country" class="form-control" id="school_country" value="<?php echo $data_query['school_country']; ?>" autocomplete="off" required placeholder="Enter Country Name">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Description :<span style="color:red;">*</span> </label>
            <textarea name="notice_description" class="form-control" id="n_des"><?php echo $data_query['notice_description']; ?></textarea>
            </div>
            
             <input type="hidden" name="edit_id" id="edit_id" value="<?php  echo $data_query['notice_id'];?>">
          <input type="submit" class="btn btn-primary mr-2" name="edit_notice" id="edit_notice" value="Submit">
          <?php
          } else {
          ?>
            <div class="form-group">
            <label for="exampleInputUsername1">Notice Title :<span style="color:red;">*</span> </label>
            <input type="text" name="notice_title" class="form-control" id="notice_title" autocomplete="off" required placeholder="Enter Notice Title">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Notice Date :<span style="color:red;">*</span> </label>
            <input type="date" name="notice_date" class="form-control" id="notice_date" autocomplete="off" required placeholder="Enter Notice Date">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">School Name :<span style="color:red;">*</span> </label>
            <input type="text" name="school_name" class="form-control" id="school_name" autocomplete="off" required placeholder="Enter School Name">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">School Address : <span style="color:red;">*</span></label>
            <input type="text" name="school_address" class="form-control" id="school_address" autocomplete="off" required placeholder="Enter School Address">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">State : <span style="color:red;">*</span></label>
            <input type="text" name="school_state" class="form-control" id="school_state" autocomplete="off" required placeholder="Enter State Name">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Pin : <span style="color:red;">*</span></label>
            <input type="text" name="school_pin" class="form-control" id="school_pin" autocomplete="off" required placeholder="Enter Pin No.">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Country : <span style="color:red;">*</span></label>
            <input type="text" name="school_country" class="form-control" id="school_country" autocomplete="off" required placeholder="Enter Country Name">   
            </div>

            <div class="form-group">
            <label for="exampleInputUsername1">Description :<span style="color:red;">*</span> </label>
            <textarea name="notice_description" class="form-control" id="n_des"></textarea>
            </div>






          <input type="submit" class="btn btn-primary mr-2" name="add_notice" id="add_notice" value="Submit">
         <?php
          }
          ?>
          
        </form>
      </div>
    </div>
  </div>
</div>
<?php  
        } else { header("location:index.php");}
         include("common/footer.php"); 
?>
