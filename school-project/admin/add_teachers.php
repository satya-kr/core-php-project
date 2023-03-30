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
      $sql = "select * from peters_teachers where teachers_id='" . $_GET[ 'id' ] . "'";
        
       // echo $sql;
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
            <h6 class="card-title">Edit Teacher</h6>
            <?php
            } else {
              ?>
            <h6 class="card-title">Add Teacher</h6>
            <?php
            }
            ?>
            <form name="class_form" method="post" action="hwnd_teachers.php" class="forms-sample">
              <?php
              if ( !empty( $edit_id ) ) {
                ?>
               <div class="form-group">
                <label for="exampleInputUsername1">Teacher Name: <span style="color:red;">*</span></label>
                <input type="text" name="teacher_name" value="<?php echo $data_query['teachers_name']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter subject Name" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Class Name: <span style="color:red;">*</span></label>
                   <select name="class_name[]" data-placeholder="Class Name" class="js-example-basic-multiple w-100" multiple="multiple" data-width="100%" required>
<!--                <select name="class_name[]" multiple required>-->
<!--                  <option value="">Class Name</option>-->
                  <?php
                  $multi_class = explode( ",", $data_query['teachers_class'] );
                  
                  $sql_class = "select * from peters_class_name";
                  $query_class = mysqli_query( $conn, $sql_class );
                  $num_class = mysqli_num_rows( $query_class );
                  if ( $num_class > 0 ) {
                    while ( $data_class = mysqli_fetch_assoc( $query_class ) ) {
                      ?>
                  <?php if(in_array($data_class['class_id'],$multi_class)) $str_flag = "selected"; else $str_flag=""; ?>
                  <option value="<?php echo $data_class['class_id']; ?>" <?php echo $str_flag; ?>><?php echo $data_class['class_name']; ?></option>
                  <?php
                  }
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Email Id: <span style="color:red;">*</span></label>
                <input type="email" name="email_address" value="<?php echo $data_query['teachers_email_id']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter email id." required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Mobile No.: <span style="color:red;">*</span></label>
                <input type="text" name="mobile_no" value="<?php echo $data_query['teachers_phone_no']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter mobile no." required>
              </div>
              <input type="hidden" name="edit_id" id="edit_id" value="<?php  echo $data_query['teachers_id'];?>">
              <input type="submit" class="btn btn-primary mr-2" name="edit_teacher" id="edit_teacher" value="Submit">
              <?php
              } else {
                ?>
              <div class="form-group">
                <label for="exampleInputUsername1">Teacher Name: <span style="color:red;">*</span></label>
                <input type="text" name="teacher_name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter subject Name" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Class Name: <span style="color:red;">*</span></label>
                  <select name="class_name[]" class="js-example-basic-multiple w-100" multiple="multiple" data-width="100%" required data-placeholder="Class Name">
<!--                <select name="class_name[]" multiple required>-->
<!--                 <option value="">Select class</option>-->
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
                <label for="exampleInputUsername1">Email Id: <span style="color:red;">*</span></label>
                <input type="email" name="email_address" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter email id." required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Mobile No.: <span style="color:red;">*</span></label>
                <input type="text" name="mobile_no" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter mobile no." required>
              </div>
              <input type="submit" class="btn btn-primary mr-2" name="add_teacher" id="add_teacher" value="Submit">
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
