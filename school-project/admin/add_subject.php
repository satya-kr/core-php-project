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
            <?php
            if ( !empty( $edit_id ) ) {
              ?>
            <h6 class="card-title">Edit Subject</h6>
            <?php
            } else {
              ?>
            <h6 class="card-title">Add Subject</h6>
            <?php
            }
            ?>
            <form name="class_form" method="post" action="hwnd_subject.php" class="forms-sample">
              <?php
              if ( !empty( $edit_id ) ) {
                ?>
              <div class="form-group">
                <label for="exampleInputUsername1">Class Name:<span style="color:red;">*</span> </label>
                <select name="class_id" required>
                  <option value="">Class Name</option>
                  <?php
                  $sql_class = "select * from peters_class_name";
                  $query_class = mysqli_query( $conn, $sql_class );
                  $num_class = mysqli_num_rows( $query_class );
                  if ( $num_class > 0 ) {
                    while ( $data_class = mysqli_fetch_assoc( $query_class ) ) {
                      ?>
                  <option value="<?php echo $data_class['class_id']; ?>" <?php if($data_class['class_id']==$data_query['class_id']){ ?>selected<?php } ?>>
                      <?php echo ucfirst($data_class['class_name']); ?></option>
                  <?php
                  }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Subject Name: <span style="color:red;">*</span></label>
                <input type="text" name="subject_name" value="<?php echo $data_query['subject_name'];?> " class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter subject Name" required>
                <input type="hidden" name="edit_id" id="edit_id" value="<?php  echo $data_query['subject_id'];?>">
              </div>
              <input type="submit" class="btn btn-primary mr-2" name="edit_subject" id="edit_subject" value="Submit">
              <?php
              } else {
                ?>
              <div class="form-group">
                <label for="exampleInputUsername1">Class Name: <span style="color:red;">*</span></label>
                <select name="class_id" required>
                  <option value="">Class Name</option>
                  <?php
                  $sql_class = "select * from peters_class_name";
                  $query_class = mysqli_query( $conn, $sql_class );
                  $num_class = mysqli_num_rows( $query_class );
                  if ( $num_class > 0 ) {
                    while ( $data_class = mysqli_fetch_assoc( $query_class ) ) {
                      ?>
                  <option value="<?php echo $data_class['class_id']; ?>"><?php echo $data_class['class_name']; ?></option>
                  <?php
                  }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Subject Name: <span style="color:red;">*</span></label>
                <input type="text" name="subject_name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter subject Name" required>
              </div>
              <input type="submit" class="btn btn-primary mr-2" name="add_subject" id="add_subject" value="Submit">
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
