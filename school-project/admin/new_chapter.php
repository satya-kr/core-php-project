<?php include("common/header.php");  ?>

<body>
  <div class="main-wrapper">

    <?php include("common/left_panel_teachers.php");  ?>

    <!-- partial -->

    <div class="page-wrapper">

      <?php include("common/navbar.php");  ?>
      <?php
      $teacher_id = $_SESSION['login_id'];

      $class = $_GET['c'];
      $section = $_GET['se'];

      $sql_class = "select * from peters_class_name where class_id='" . $class . "'";
      $qry = $conn->query($sql_class);
      $qry_data = $qry->fetch_assoc();
      $c_id = $qry_data['class_id'];
      $sql = "select * from peters_teachers_assign_class where teachers_id = '$teacher_id' and class_id = '$class'";

      $sql_query = mysqli_query($conn, $sql);
      $num_query = mysqli_num_rows($sql_query);

      //echo $a.'<br>';
      $subject_id = $_GET['id'];
      $sql_subject = "select * from peters_subject where subject_id ='" . $subject_id . "'";
      $sql_query_subject = mysqli_query($conn, $sql_subject);
      // $data_query_subject = mysqli_fetch_assoc($sql_query_subject);
      $sub_data = mysqli_fetch_assoc($sql_query_subject);
      ?>

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
         <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Add Chapter</h6>
                <form class="forms-sample" method='post' enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="chapter_no">Chapter No.</label>
                    <input type="text" class="form-control" id="chapter_no" autocomplete="off" placeholder="Chapter No" name='chapter'>
                  </div>
                  <div class="form-group">
                    <label for="chapter_title">Chapter Title</label>
                    <input type="text" class="form-control" id="chapter_title" placeholder="Chapter Title" name='title'>
                  </div>
                  <div class="form-group">
                    <input type="file" name="docs[]" id="" multiple>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name='add_docs'>Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
        $i = 0;
        $countfiles = 0;
        if (isset($_POST['add_docs'])) {
          $date = date('Y-m-d');
          $c_no = $_POST['chapter'];
          $c_title =  $_POST['title'];
          $countfiles = count($file = $_FILES['docs']['name']);
          for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['docs']['name'][$i];
            $ext = pathinfo($filename);

            $filename = rand(111, 999) . '-' . $qry_data['class_name'] . '-' . $sub_data['subject_name'] . '-' . $i . '.' . $ext['extension'];
            // Upload file
            move_uploaded_file($_FILES['docs']['tmp_name'][$i], 'uploaded_docs/' . $filename);
            $section = strtoupper($section);
            $query2 = "INSERT INTO `peters_documents`(`documents_id`,`teachers_id`, `class_id`,`section`,`subject_id`,`chapter_no`,`chapter_title`,`document_name`,`document_create_date`) VALUES (null,'$teacher_id','$class','$section','$subject_id','$c_no','$c_title','$filename','$date')";

           // echo $query2;
           // exit;
            $queryData2 = mysqli_query($conn, $query2);
            // $q3 = "UPDATE `peters_documents` set `document_status` = 0 where `document_create_date` > DATE_SUB(NOW(), INTERVAL 7 DAY)";
            // $runQ3 = $conn->query($q3);
          }
          if ($i == $countfiles) {
            // echo '<script>location.reload();</script>';
            echo '<script>location.href="add_chapters.php?s=' . $subject_id . '&c=' . $c_id . '&se=' . $section . '"</script>';
          }
        }


        ?>
        <!-- row -->

      </div>


      <?php include("common/footer.php"); ?>