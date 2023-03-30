<?php include("common/header.php");  ?>

<body>
  <div class="main-wrapper">
    <?php include("common/left_panel_teachers.php");  ?>
    <!-- partial -->
    <div class="page-wrapper">
      <?php include("common/navbar.php");  ?>
      <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class=""> <span class="input-group-addon bg-transparent">
              </span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Class</h6>
                </div>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Subject</th>
                        <th>Add Chapters</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $teacher_id = $_SESSION['login_id'];
                      if (isset($_GET['class'])) {
                        $class = $_GET['class'];
                        $sql_class = "select * from peters_class_name where class_id='" . $class . "'";
                        $qry = $conn->query($sql_class);
                        $qry_data = $qry->fetch_assoc();
                        $c_id = $qry_data['class_id'];
                        $sql = "select * from peters_teachers_assign_class where teachers_id = '$teacher_id' and class_id = '$class'";
                      } else {
                        $sql_class = "select * from peters_class_name";
                        $qry = $conn->query($sql_class);
                        $qry_data = $qry->fetch_assoc();
                        $c_id = $qry_data['class_id'];
                        $sql = "select * from peters_teachers_assign_class where teachers_id = '$teacher_id'";
                      }
                      $sql_query = mysqli_query($conn, $sql);
                      $num_query = mysqli_num_rows($sql_query);
                      if ($num_query > 0) {
                        $i = 1;
                        while ($data_query = mysqli_fetch_assoc($sql_query)) {
                          $teacher_class = explode(',', $data_query['class_id']);
                          // print '<pre>';
                          $total_class = count($teacher_class);
                          for ($a = 0; $a < $total_class; $a++) {
                            $class_id = $teacher_class[$a];
                            $sql_class = "select * from peters_class_name where class_id='" . $class_id . "'";
                            $sql_query_class = mysqli_query($conn, $sql_class);
                            $data_query_class = mysqli_fetch_assoc($sql_query_class);
                            //echo $data_query_class['class_name'].'&nbsp;&nbsp;';
                          }
                          $teacher_subject_a = explode(',', $data_query['sec_a_subject_id']);
                          $total_subject_a = count($teacher_subject_a);

                          $teacher_subject_b = explode(',', $data_query['sec_b_subject_id']);
                          $total_subject_b = count($teacher_subject_b);
                          // print_r($teacher_subject_b);
                          for ($b = 0; $b < $total_subject_a; $b++) {
                            $subject_id = $teacher_subject_a[$b];
                            $sql_subject = "select * from peters_subject where subject_id ='" . $subject_id . "'";
                            $sql_query_subject = mysqli_query($conn, $sql_subject);
                            // $data_query_subject = mysqli_fetch_assoc($sql_query_subject);
                            if (mysqli_num_rows($sql_query_subject) > 0) {
                              // echo '<b>Section : A</b>';
                              while ($sub_data = mysqli_fetch_assoc($sql_query_subject)) {
                      ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $data_query_class['class_name'] ?></td>
                                  <td>A</td>
                                  <td><?= $sub_data['subject_name'] ?></td>
                                  <td><a href="add_chapters.php?s=<?php echo $sub_data['subject_id'] . '&c=' . $class_id .'&se=a' ?>" class="btn btn-primary">Add</a></td>
                                </tr>
                          <?php
                                $i++;
                              }
                            }
                          }
                          ?>

                          <?php
                          for ($c = 0; $c < $total_subject_b; $c++) {
                            $subject_id = $teacher_subject_b[$c];
                            $sql_subject = "select * from peters_subject where subject_id ='" . $subject_id . "'";
                            $sql_query_subject = mysqli_query($conn, $sql_subject);
                            // $data_query_subject = mysqli_fetch_assoc($sql_query_subject);
                            if (mysqli_num_rows($sql_query_subject) > 0) {
                              // echo '<b>Section : A</b>';
                              while ($sub_data = mysqli_fetch_assoc($sql_query_subject)) {
                          ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $data_query_class['class_name'] ?></td>
                                  <td>B</td>
                                  <td><?= $sub_data['subject_name'] ?></td>
                                  <td><a href="add_chapters.php?s=<?php echo $sub_data['subject_id'] . '&c=' . $class_id .'&se=b' ?>" class="btn btn-primary">Add</a></td>
                                </tr>
                          <?php
                                $i++;
                              }
                            }
                          }
                          ?>

                        <?php

                        }
                      } else {
                        ?>

                        <tr>
                          <td colspan="8" style="color:red;">No Records Found!</td>
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
        <!-- row -->

      </div>


      <?php include("common/footer.php"); ?>