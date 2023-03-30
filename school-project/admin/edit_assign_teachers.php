<?php  include("common/header.php");  ?>
<body>
<div class="main-wrapper">
  <?php include("common/left_panel_admin.php");  ?>
  <div class="page-wrapper">
    <?php include("common/navbar.php");  ?>
    <?php
    if ( isset( $_GET[ 'id' ] ) ) {
      // echo "hello";
      $teachers_id = $_GET[ 'id' ];
      $sql = "select * from peters_teachers where teachers_id='" . $_GET[ 'id' ] . "'";
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
            <h6 class="card-title">Assign Teacher</h6>
            <form name="assign_form" method="post" action="hwnd_edit_assign_teachers.php" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Teacher Name: </label>
              
                <?php echo $data_query['teachers_name']; ?>
              </div>
                
             
                
               
              <?php
              $class = explode( ',', $data_query[ 'teachers_class' ] );
              $total_class = count( $class );
              for ( $i = 0; $i < $total_class; $i++ ) {
                $class_id = $class[ $i ];
                $sql_class = "select * from peters_class_name where class_id='" . $class_id . "'";
                $query_class = mysqli_query( $conn, $sql_class );
                $data_class = mysqli_fetch_assoc( $query_class );
                $sql_subject = "select * from peters_subject where class_id ='" . $class_id . "'";
                $sql_query_subject = mysqli_query( $conn, $sql_subject );

                $sql_subject2 = "select * from peters_subject where class_id ='" . $class_id . "'";
                $sql_query_subject2 = mysqli_query( $conn, $sql_subject2 );
                echo '<br><b>Class Name : ' . strtoupper($data_class[ 'class_name' ]).'</b>';
                  
                 
                $sql_assign = "select * from peters_teachers_assign_class where class_id='" . $class_id . "' and teachers_id='".$data_query['teachers_id']."'";
                $query_assign = mysqli_query( $conn, $sql_assign );
                $num_assign = mysqli_num_rows($query_assign);
                $data_assign = mysqli_fetch_assoc( $query_assign );

//echo $data_assign['sec_a_subject_id'];

                if(!empty($data_assign['sec_a_subject_id'])) {
                    $multi_class_a = explode( ",", $data_assign['sec_a_subject_id'] ); 
                   // $multi_class_b = explode( ",", $data_assign['sec_b_subject_id'] ); 
                }
                if(!empty($data_assign['sec_b_subject_id'])) {
                 // $multi_class_a = explode( ",", $data_assign['sec_a_subject_id'] ); 
                  $multi_class_b = explode( ",", $data_assign['sec_b_subject_id'] ); 
              }
              // $multi_class_a = explode( ",", $data_assign['sec_a_subject_id'] ); 
              // $multi_class_b = explode( ",", $data_assign['sec_b_subject_id'] ); 
              // print '<pre>';
              // print_r($multi_class_a);
              // print_r($multi_class_b);

                ?>
                <br>  
                Section : A
              <select data-placeholder="Select Section A Subject" name="section_a_subject_names<?php echo $i; ?>[]"  class="js-example-basic-multiple w-100" multiple="multiple" data-width="100%" >
                <?php
                    while ( $data_query_subject = mysqli_fetch_assoc( $sql_query_subject ) ) {
                ?>
                  <?php 
                  if(!empty($multi_class_a)) {
                      if(in_array($data_query_subject['subject_id'],$multi_class_a)) $str_flag = "selected"; else $str_flag=""; 
                  }
                  
                  ?>
                <option value="<?php echo $data_query_subject['subject_id']; ?>" <?php if(!empty($str_flag)) { echo $str_flag; } ?>><?php echo $data_query_subject['subject_name']; ?></option>
                <?php
                }
                ?>
              </select>


              <br><br> 
              Section : B
              <select data-placeholder="Select Section B Subject" name="section_b_subject_names<?php echo $i; ?>[]"  class="js-example-basic-multiple w-100" multiple="multiple" data-width="100%" >
                <?php
                    while ( $data_query_subject2 = mysqli_fetch_assoc( $sql_query_subject2 ) ) {
                ?>
                  <?php 
                   if(!empty($multi_class_a)) {
                      if(in_array($data_query_subject2['subject_id'],$multi_class_b)) $str_flagb = "selected"; else $str_flagb=""; 
                   }
                  ?>
                <option value="<?php echo $data_query_subject2['subject_id']; ?>" <?php if(!empty($str_flagb)) { echo $str_flagb; } ?>><?php echo $data_query_subject2['subject_name']; ?></option>
                <?php
                }
                ?>
              </select>


              <?php
              }
              ?>
                <input type="hidden" name="teachers_id" id="teachers_id" value="<?php  echo $data_query['teachers_id'];?>">
              <input type="hidden" name="edit_id" id="edit_id" value="<?php  echo $data_query['teachers_id'];?>">
              <input type="submit" class="btn btn-primary mr-2" name="assign_teacher" id="assign_teacher" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php  include("common/footer.php"); ?>
