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
      $subject_id = $_GET['s'];
      $document_id = $_GET['d'];
      $section = $_GET['se'];

      $sql_doc = "select * from `peters_documents` where documents_id= '$document_id' and `teachers_id` = '$teacher_id' and `subject_id` = '$subject_id' and `class_id` = '$class'";

     // echo  $sql_doc;
      $run_doc = mysqli_query($conn, $sql_doc);
      $num_doc = mysqli_num_rows($run_doc);
      $data_doc = mysqli_fetch_assoc($run_doc);

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
                <form class="forms-sample" method='post' enctype="multipart/form-data" action="hwnd_edit_chapter.php">
                  <div class="form-group">
                    <label for="chapter_no">Chapter No.</label>
                    <input type="text" class="form-control" id="chapter_no" value="<?php echo $data_doc['chapter_no']; ?>" autocomplete="off" placeholder="Chapter No" name='chapter'>
                  </div>
                  <div class="form-group">
                    <label for="chapter_title">Chapter Title</label>
                    <input type="text" class="form-control" id="chapter_title" value="<?php echo $data_doc['chapter_title']; ?>"  placeholder="Chapter Title" name='title'>
                  </div>
                  <?php if(!empty($data_doc['document_name'])) { ?>
                  <div class="form-group">
                  <label for="existing_document">Existing Document :</label>
                    <?php echo $data_doc['document_name']; ?>
                  </div>
                  <?php  } ?>
                    <div class="form-group">
                    <label for="upload_document">Upload Document :</label>
                    <input type="file" name="docs" id="" multiple>
                  </div>
                  
                  <input type="hidden" name="documents_id" id="documents_id" value="<?php echo $document_id; ?>" >
                  <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $subject_id; ?>" >
                  <input type="hidden" name="teachers_id" id="teachers_id" value="<?php echo $teacher_id; ?>" >
                  <input type="hidden" name="class_id" id="class_id" value="<?php echo $class; ?>" >
                  <input type="hidden" name="section" id="section" value="<?php echo $section; ?>" >

                  <!-- <button type="submit" class="btn btn-primary mr-2" name='add_docs'>Submit</button> -->
                  <input type="submit" class="btn btn-primary mr-2" name='add_docs' value="Submit">
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>

      <?php include("common/footer.php"); ?>