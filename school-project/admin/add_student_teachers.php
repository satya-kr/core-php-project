<?php  
    include("common/header.php");  
    if($_SESSION[ "login" ]=='yes' && $_SESSION[ "login_type" ]=='teachers') { 
?>
<body>
<div class="main-wrapper">
  <?php include("common/left_panel_teachers.php");  ?>
  <div class="page-wrapper">
    <?php include("common/navbar.php");  ?>
    <?php
    if ( isset( $_GET[ 'id' ] ) ) {
      // echo "hello";
      $edit_id = $_GET[ 'id' ];
      $sql = "select * from peters_student where student_id='" . $_GET[ 'id' ] . "'";
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
            <h6 class="card-title">Edit Student</h6>
            <?php
            } else {
              ?>
            <h6 class="card-title">Add Student</h6>
            <?php
            }
            ?>
            <form name="student_form" method="post" action="hwnd_add_student_teachers.php" class="forms-sample">
              <?php
              if ( !empty( $edit_id ) ) {
                ?>
              
             <div class="form-group">
                <label for="exampleInputUsername1">First Name: <span style="color:red;">*</span></label>
                <input type="text" name="first_name" value="<?php echo $data_query['student_first_name']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter First Name" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Last Name: <span style="color:red;">*</span></label>
                <input type="text" name="last_name"  value="<?php echo $data_query['student_last_name']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Last Name" required>
              </div>
                <div class="form-group">
                <label for="exampleInputUsername1">Father's Name: <span style="color:red;">*</span></label>
                <input type="text" name="fathers_name" value="<?php echo $data_query['student_fathers_name']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Fathers Name" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Mother's Name: </label>
                <input type="text" name="mothers_name" value="<?php echo $data_query['student_mothers_name']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Mothers Name" >
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Email Id.:<span style="color:red;">*</span> </label>
                <input type="email" name="email_address" value="<?php echo $data_query['student_email_address']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Mobile No." required>
              </div>
                <div class="form-group">
                <label for="exampleInputUsername1">Mobile No.: </label>
                <input type="text" name="mobile_no" value="<?php echo $data_query['student_phone_no']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Mobile No." >
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Address: </label>
                  <textarea class="form-control" name="student_address" rows="8" ><?php echo $data_query['student_address']; ?></textarea>
              </div>
                <div class="form-group">
                <label for="exampleInputUsername1">Class Name: <span style="color:red;">*</span></label>
                <select name="class_name" required>
                  <option value="">Class Name</option>
                  <?php
                  $sql_class = "select * from peters_class_name";
                  $query_class = mysqli_query( $conn, $sql_class );
                  $num_class = mysqli_num_rows( $query_class );
                  if ( $num_class > 0 ) {
                    while ( $data_class = mysqli_fetch_assoc( $query_class ) ) {
                      ?>
                  <option value="<?php echo $data_class['class_id']; ?>" <?php if($data_class['class_id']==$data_query['student_class']){ ?>selected<?php } ?>><?php echo $data_class['class_name']; ?></option>
                  <?php
                  }
                  }
                  ?>
                </select>
                </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Section: </label>
               <select name="student_section" >
                   <option value="">Choose Section</option>
                   <option value="A" <?php if($data_query['student_section']=='A'){ ?>selected<?php } ?>>A</option>
                   <option value="B" <?php if($data_query['student_section']=='B'){ ?>selected<?php } ?>>B</option>
                  
                </select>
                
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Roll No. : </label>
                <input type="text" name="student_roll_no" value="<?php echo $data_query['student_roll_no']; ?>" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Roll No." >
              </div>
                <input type="hidden" name="edit_id" id="edit_id" value="<?php  echo $data_query['student_id'];?>">
                  <input type="submit" class="btn btn-primary mr-2" name="edit_class" id="edit_class" value="Submit">

              <?php
              } else {
                ?>
              <div class="form-group">
                <label for="exampleInputUsername1">First Name: <span style="color:red;">*</span></label>
                <input type="text" name="first_name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter First Name" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Last Name: <span style="color:red;">*</span></label>
                <input type="text" name="last_name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Last Name" required>
              </div>
                <div class="form-group">
                <label for="exampleInputUsername1">Father's Name: <span style="color:red;">*</span></label>
                <input type="text" name="fathers_name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Fathers Name" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Mother's Name: </label>
                <input type="text" name="mothers_name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Mothers Name" >
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Email Id.:<span style="color:red;">*</span> </label>
                <input type="email" name="email_address" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Mobile No." required>
              </div>
                <div class="form-group">
                <label for="exampleInputUsername1">Mobile No.: </label>
                <input type="text" name="mobile_no" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Mobile No." >
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Address: </label>
                  <textarea class="form-control" name="student_address" rows="8" ></textarea>
              </div>
                <div class="form-group">
                <label for="exampleInputUsername1">Class Name: <span style="color:red;">*</span></label>
                <select name="class_name" required>
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
                <label for="exampleInputUsername1">Section: </label>
               <select name="student_section">
                   <option value="">Choose Section</option>
                   <option value="A">A</option>
                   <option value="B">B</option>
                  
                </select>
                
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Roll No. : </label>
                <input type="text" name="student_roll_no" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Enter Roll No." >
              </div>
               
                
                
                
                
                
                
              <input type="submit" class="btn btn-primary mr-2" name="add_student" id="add_student" value="Submit">
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
