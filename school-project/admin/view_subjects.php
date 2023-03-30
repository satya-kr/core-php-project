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
            <h6 class="card-title">View Teacher</h6>
           
              <div class="form-group">
                <label for="exampleInputUsername1">Teacher Name: </label>
                <?php echo $data_query['teachers_name']; ?>
              </div>
              <?php
               $sql_tech = "select * from peters_teachers_assign_class where teachers_id='" . $_GET[ 'id' ] . "'";
               $sql_query_tech = mysqli_query( $conn, $sql_tech );
              while( $data_query_tech = mysqli_fetch_assoc( $sql_query_tech ))
              {
                  $class_id = $data_query_tech['class_id'];
                  $sec_a_subject_id = $data_query_tech['sec_a_subject_id'];
                  $sec_b_subject_id = $data_query_tech['sec_b_subject_id'];

                  $sql_class = "select * from peters_class_name where class_id='" . $class_id . "'";
                  $query_class = mysqli_query( $conn, $sql_class );
                  $data_class = mysqli_fetch_assoc( $query_class );
                  echo  "<b>Class Name : ".strtoupper($data_class[ 'class_name' ]).'</b>';
                  echo '<br>';
                 // echo $subject_id;

                  $sec_a_subject_id = explode( ',', $sec_a_subject_id );
                  $sec_a_total_class = count( $sec_a_subject_id );
                  echo "<b>Section A :  </b>";
                  for ( $i = 0; $i < $sec_a_total_class; $i++ ) {
                     // echo $subject[$i];
                      $sql_subject = "select * from peters_subject where class_id ='" . $class_id . "' and subject_id ='".$sec_a_subject_id[$i]."'";
                      $sql_query_subject = mysqli_query( $conn, $sql_subject );
                      $data_query_subject = mysqli_fetch_assoc( $sql_query_subject );
                      echo ucwords($data_query_subject['subject_name']),'&nbsp;&nbsp; ';
                  }
                  echo '<br>';
                  $sec_b_subject_id = explode( ',', $sec_b_subject_id );
                  $sec_b_total_class = count( $sec_b_subject_id );
                  echo "<b>Section B :  </b>";
                  for ( $j = 0; $j < $sec_b_total_class; $j++ ) {
                     // echo $subject[$i];
                      $sql_subject2 = "select * from peters_subject where class_id ='" . $class_id . "' and subject_id ='".$sec_b_subject_id[$j]."'";
                      $sql_query_subject2 = mysqli_query( $conn, $sql_subject2 );
                      $data_query_subject2 = mysqli_fetch_assoc( $sql_query_subject2 );
                      echo ucwords($data_query_subject2['subject_name']).'&nbsp;&nbsp;';
                      //echo substr($sub,0,-1);
                  }


                 // print '<pre>';
                 // print_r($data_query_subject);

                 // echo "<b>Section A :</b>". ucwords($data_query_subject['subject_name']),', ';
                  echo '<br><br><br>';
              }


            /*  $class = explode( ',', $data_query[ 'teachers_class' ] );
              $total_class = count( $class );
              for ( $i = 0; $i < $total_class; $i++ ) {
                $class_id = $class[ $i ];
                $sql_class = "select * from peters_class_name where class_id='" . $class_id . "'";
                $query_class = mysqli_query( $conn, $sql_class );
                $data_class = mysqli_fetch_assoc( $query_class );
                $sql_subject = "select * from peters_subject where class_id ='" . $class_id . "'";
                $sql_query_subject = mysqli_query( $conn, $sql_subject );
                echo  ucwords($data_class[ 'class_name' ]);
                echo '<br/>';
                ?>
              
                <?php
                while ( $data_query_subject = mysqli_fetch_assoc( $sql_query_subject ) ) {
                  ?>
                <?php echo $data_query_subject['subject_name'].'<br />'; ?>
                <?php
                }
                ?>
              
              <?php
              } */
              ?>
                
           
          </div>
        </div>
      </div>
    </div>
<?php  
        } else { header("location:index.php");}
         include("common/footer.php"); 
?>
