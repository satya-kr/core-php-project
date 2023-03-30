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
     $sql = "select * from peters_class_name where class_id='".$_GET['id']."'";
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
              <h6 class="card-title">Edit Class</h6>
          <?php
          } else {
          ?>
              <h6 class="card-title">Add Class</h6>
          <?php
          }
          ?>
        <form name="class_form" method="post" action="hwnd_class.php" class="forms-sample">
          
        <?php
          if(!empty($edit_id))
          {
          ?>
            <div class="form-group">
            <label for="exampleInputUsername1">Class Name:<span style="color:red;">*</span> </label>
            <input type="text" name="class_name" value="<?php echo $data_query['class_name'];?> " class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter class Name" required>
            <input type="hidden" name="edit_id" id="edit_id" value="<?php  echo $data_query['class_id'];?>">
            </div>
          <input type="submit" class="btn btn-primary mr-2" name="edit_class" id="edit_class" value="Submit">
          <?php
          } else {
          ?>
            <div class="form-group">
            <label for="exampleInputUsername1">Class Name: <span style="color:red;">*</span></label>
           <input type="text" name="class_name" class="form-control" id="exampleInputUsername1" autocomplete="off" required placeholder="Enter class Name">   
            </div>
          <input type="submit" class="btn btn-primary mr-2" name="add_class" id="add_class" value="Submit">
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
