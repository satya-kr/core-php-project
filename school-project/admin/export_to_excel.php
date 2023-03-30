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
    if ( isset( $_GET[ 'id' ] ) ) {
      // echo "hello";
      $edit_id = $_GET[ 'id' ];
      $sql = "select * from peters_subject where subject_id='" . $_GET[ 'id' ] . "'";
      $sql_query = mysqli_query( $conn, $sql );
      $data_query = mysqli_fetch_assoc( $sql_query );
    }

    ?>
    <div class="page-content">
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div> </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
          <div class="" > <span class="input-group-addon bg-transparent"> </span> </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form name="class_form" method="post" action="hwnd_export.php" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Choose Class : <span style="color:red;">*</span></label>
                <select name="class_name" required>
                  <option value="">Class Name</option>
                  <?php
                  $sql_class = "select * from peters_class_name";
                  $query_class = mysqli_query( $conn, $sql_class );
                  $num_class = mysqli_num_rows( $query_class );
                  if ( $num_class > 0 ) {
                    while ( $data_class = mysqli_fetch_assoc( $query_class ) ) {
                      ?>
                  <option value="<?php echo $data_class['class_id']; ?>">
                      <?php echo ucfirst($data_class['class_name']); ?></option>
                  <?php
                  }
                }
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
          </div>
        </div>
      </div>
    </div>
<?php  
        } else { header("location:index.php");}
         include("common/footer.php"); 
?>
