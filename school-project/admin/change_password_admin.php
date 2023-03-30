<?php
include( "common/header.php" );
if ( $_SESSION[ "login" ] == 'yes' && $_SESSION[ "login_type" ] == 'admin' ) {
  ?>
<body>
<div class="main-wrapper">
<?php include("common/left_panel_admin.php");  ?>
<div class="page-wrapper">
<?php include("common/navbar.php");  ?>
<?php
    $sql = "select * from peters_admin where admin_id='" . $_SESSION[ "login_id" ] . "' and login_type='admin'";
    $sql_query = mysqli_query( $conn, $sql );
    $data_query = mysqli_fetch_assoc( $sql_query );
?>
<div class="page-content">
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div> </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <div class="" > <span class="input-group-addon bg-transparent"> </span> </div>
    </div>
  </div>
    
    <?php
        if(isset($_GET['s']))
          {
             if($_GET['s']==1){
                 ?>
          <p style="color:green;">Password changed successfully.</p>
          <?php
             } 
          }

          if(isset($_GET['e']))
          {
             if($_GET['e']==1){
                 ?>
          <p style="color:red;">Password not changed!</p>
          <?php
             } 
          }
          ?>
    
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <h6 class="card-title">Change Password</h6>
        <form name="change_pass_form" method="post" action="hwnd_change_password.php" class="forms-sample">
            
          <div class="form-group">
            <label for="exampleInputUsername1">Username :<span style="color:red;">*</span> </label>
            <input type="text" name="user_admin" value="<?php echo $data_query['admin_username']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" required placeholder="User Name">
          </div>
            
          <div class="form-group">
            <label for="exampleInputUsername1">Old Password : <span style="color:red;">*</span></label>
            <input type="text" name="old_password" value="<?php echo $data_query['admin_password']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" required placeholder="Old Password">
          </div>
            
          <div class="form-group">
            <label for="exampleInputUsername1">New Password :<span style="color:red;">*</span> </label>
            <input type="text" name="new_password" class="form-control" id="exampleInputUsername1" autocomplete="off" required placeholder="New Password">
          </div>
            
        <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $data_query['admin_id']; ?>">
        <input type="hidden" name="login_type" id="login_type" value="<?php echo $data_query['login_type']; ?>">
            
            
          <input type="submit" class="btn btn-primary mr-2" name="change_pass" id="change_pass" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>
<?php
} else {
  header( "location:index.php" );
}
include( "common/footer.php" );
?>
