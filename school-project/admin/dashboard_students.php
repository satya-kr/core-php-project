<?php
include( "common/header.php" );
if ( $_SESSION[ "login" ] == 'yes' && $_SESSION[ "login_type" ] == 'students' ) {
  ?>
<body>
<div class="main-wrapper">
<?php include("common/left_panel_students.php");  ?>
<!-- partial -->
<div class="page-wrapper">
<?php include("common/navbar.php");  ?>
<div class="page-content">
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <div class="" > <span class="input-group-addon bg-transparent"> </span> </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-7 col-xl-8 stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h6 class="card-title mb-0">Subjects</h6>
            <div class="dropdown mb-2"> </div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th class="pt-0">#</th>
                  <th class="pt-0">Subject Name</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $student_id = $_SESSION[ "login_id" ];
                $sql_student = "select * from peters_student where student_id ='" . $student_id . "' and login_type='students' "; // fetch class id

                $query_student = mysqli_query( $conn, $sql_student );
                $data_student = mysqli_fetch_assoc( $query_student );

                $sql_documents = "select * from peters_documents where class_id ='" . $data_student[ 'student_class' ] . "' and `section` = '". $data_student['student_section']. "' group by subject_id";
                $query_documents = mysqli_query( $conn, $sql_documents );
                $num_documents = mysqli_num_rows($query_documents);


               
                if($num_documents>0)
                {
                $i = 1;
                while ( $data_documents = mysqli_fetch_assoc( $query_documents ) ) {
                  $sql_subject = "select * from peters_subject where subject_id ='" . $data_documents[ 'subject_id' ] . "' and class_id='" . $data_student[ 'student_class' ] . "'";


                 // echo $sql_subject;
                  $query_subject = mysqli_query( $conn, $sql_subject );
                  $data_subject = mysqli_fetch_assoc( $query_subject );

                  //echo $data_subject['subject_name']; 
                  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><a href="view_chapter.php?s=<?php echo $data_subject['subject_id']; ?>&c=<?php echo $data_documents['class_id']; ?>&se=<?php echo $data_documents['section']?>" ><?php echo $data_subject['subject_name']; ?> </a></td>
                </tr>
                <?php
                $i++;
                }
              } else {
                ?>
              <tr>
                  <td colspan="2">Records Not Found!</td>
              </tr>
                <?php
              }
                ?>
              </tbody>
            </table>
          </div>
        </div>
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
