<nav class="sidebar">
  <div class="sidebar-header"> <a href="#" class="sidebar-brand"> ST<span>Peters</span> </a>
    <div class="sidebar-toggler not-active"> <span></span> <span></span> <span></span> </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item"> <a href="dashboard_students.php" class="nav-link"> <i class="link-icon" data-feather="box"></i> <span class="link-title">Dashboard</span> </a> </li>
      <?php
      $student_id = $_SESSION[ "login_id" ];
      $sql_student = "select * from peters_student where student_id ='" . $student_id . "' and login_type='students' "; // fetch class id
      $query_student = mysqli_query( $conn, $sql_student );
      $data_student = mysqli_fetch_assoc( $query_student );

      $sql_documents = "select * from peters_documents where class_id ='" . $data_student[ 'student_class' ] . "' and `section` = '". $data_student['student_section']. "'  group by subject_id ";
      $query_documents = mysqli_query( $conn, $sql_documents );
      while ( $data_documents = mysqli_fetch_assoc( $query_documents ) ) {
        $sql_subject = "select * from peters_subject where subject_id ='" . $data_documents[ 'subject_id' ] . "' and class_id='" . $data_student[ 'student_class' ] . "'";
        $query_subject = mysqli_query( $conn, $sql_subject );
        $data_subject = mysqli_fetch_assoc( $query_subject );
        ?>
      <li class="nav-item"> <a href="view_chapter.php?s=<?php echo $data_subject['subject_id']; ?>&c=<?php echo $data_documents['class_id']; ?>" class="nav-link"> <i class="link-icon" data-feather="book-open"></i> <span class="link-title"> <?php echo $data_subject['subject_name']; ?> </span> </a> </li>
      <?php
      }
      ?>
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails"> <i class="link-icon" data-feather="settings"></i> <span class="link-title">Settings</span> <i class="link-arrow" data-feather="chevron-down"></i> </a>
        <div class="collapse" id="emails">
          <ul class="nav sub-menu">
            <li class="nav-item"> <a href="change_password_students.php" class="nav-link">Change Password</a> </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
