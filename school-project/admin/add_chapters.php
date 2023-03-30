<?php include("common/header.php");  ?>
<script>
    function deleletconfig(){

    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
       alert ("record deleted")
    }else{
        alert("Record Not Deleted")
    }
    return del;
    }
</script>
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


      // $qry = $conn->query($sql_class);
      // $qry_data = $qry->fetch_assoc();
      $qry = mysqli_query($conn,$sql_class);
      $qry_data = mysqli_fetch_assoc($qry);


      $c_id = $qry_data['class_id'];
      $sql = "select * from peters_teachers_assign_class where teachers_id = '$teacher_id' and class_id = '$class'";

      $sql_query = mysqli_query($conn, $sql);
      $num_query = mysqli_num_rows($sql_query);
      //echo $a.'<br>';
      $subject_id = $_GET['s'];
      $sql_subject = "select * from peters_subject where subject_id ='" . $subject_id . "'";
      $sql_query_subject = mysqli_query($conn, $sql_subject);
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
          <div class="col-lg-9 col-xl-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Chapters</h6>
                  <span><a href="new_chapter.php?id=<?php echo $sub_data['subject_id'] . '&c=' . $class . '&se=' . $section ?>" class="btn btn-primary">Add</a></span>
                </div>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                  <!--  <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>Chapter No</th>
                        <th>Title</th>
                        <th>Document Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     /* $i = 1;
                      $ql = "select * from `peters_documents` where `teachers_id` = '$teacher_id' and `subject_id` = '$subject_id' and `class_id` = '$class' and `section` = '$section'";
                      $run_ql = mysqli_query($conn, $ql);
                      $num_ql = mysqli_num_rows($run_ql);
                      if ($num_ql > 0) {
                        while ($data_ql = mysqli_fetch_assoc($run_ql)) {
                      ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= $data_ql['chapter_no'] ?></td>
                            <td><?= $data_ql['chapter_title'] ?></td>
                            <td><?= $data_ql['document_name']?></td>
                            <td><a href="edit_chapter.php?d=<?php echo $data_ql['documents_id'];?>&s=<?php echo $data_ql['subject_id'];?>&c=<?php echo $data_ql['class_id'];?>&se=<?php echo $section ?>"  class="btn btn-primary">Edit</a></td>
                           <td><a href="delete_chapter.php?id=<?php echo $data_ql['documents_id'];?>&s=<?php echo $data_ql['subject_id'];?>&c=<?php echo $data_ql['class_id'];?>" class="btn btn-danger" onclick="return deleletconfig()">Delete</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else {
                        ?>
                        <tr>
                          <td colspan="8" style="color:red;">No Records Found!</td>
                        </tr>
                      <?php } */ ?>
                    </tbody>
                  </table> -->

                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>Chapter No</th>
                        <th>Title</th>
                        <th>Document Create Date</th>
                        <th>Document Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $ql = "select * from `peters_documents` where `teachers_id` = '$teacher_id' and `subject_id` = '$subject_id' and `class_id` = '$class' order by document_create_date desc";
                      $run_ql = mysqli_query($conn, $ql);
                      $num_ql = mysqli_num_rows($run_ql);
                      if ($num_ql > 0) {
                        while ($data_ql = mysqli_fetch_assoc($run_ql)) {
                      ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= $data_ql['chapter_no'] ?></td>
                            <td><?= $data_ql['chapter_title'] ?></td>
                            <td><?php echo date('d-m-Y',strtotime($data_ql['document_create_date'])); ?></td>
                            <td><?= $data_ql['document_name']?></td>


                            <td><a href="edit_chapter.php?d=<?php echo $data_ql['documents_id'];?>&s=<?php echo $data_ql['subject_id'];?>&c=<?php echo $data_ql['class_id'];?>&se=<?php echo $section;?> "  class="btn btn-primary">Edit</a></td>


                           <td><a href="delete_chapter.php?id=<?php echo $data_ql['documents_id'];?>&s=<?php echo $data_ql['subject_id'];?>&c=<?php echo $data_ql['class_id'];?>" class="btn btn-danger" onclick="return deleletconfig()">Delete</a></td>
                          </tr>
                        <?php
                          $i++;
                        }
                      } else {
                        ?>
                        <tr>
                          <td colspan="8" style="color:red;">No Records Found!</td>
                        </tr>
                      <?php } ?>
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