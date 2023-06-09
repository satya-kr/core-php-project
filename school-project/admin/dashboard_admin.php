<?php  
    include("common/header.php");  
    if($_SESSION[ "login" ]=='yes' && $_SESSION[ "login_type" ]=='admin') { 
?>
<body>
<div class="main-wrapper">

<?php include("common/left_panel_admin.php");  ?>

<!-- partial -->
  
  <div class="page-wrapper"> 

  <?php include("common/navbar.php");  ?>

    
    <div class="page-content">
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
          <div class="" > <span class="input-group-addon bg-transparent">
              <!-- <i data-feather="calendar" class=" text-primary"></i> -->
            </span>
            <!-- <input type="text" class="form-control"> -->
          </div>
          <!-- <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block"> <i class="btn-icon-prepend" data-feather="download"></i> Import </button>
          <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="btn-icon-prepend" data-feather="printer"></i> Print </button>
          <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="btn-icon-prepend" data-feather="download-cloud"></i> Download Report </button> -->
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
          <div class="row flex-grow">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Total Students</h6>
<!--
                    <div class="dropdown mb-2">
                      <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i> </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a> </div>
                    </div>
-->
                  </div>
                    <?php
                     $sql_students = "select * from peters_student";
                    $sql_query_students = mysqli_query( $conn, $sql_students );
                    $num_query_students = mysqli_num_rows( $sql_query_students );                                                      
                   ?>
                    
                  <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                      <h3 class="mb-2"><?php  echo $num_query_students;?></h3>
<!--
                      <div class="d-flex align-items-baseline">
                        <p class="text-success"> <span>+3.3%</span> <i data-feather="arrow-up" class="icon-sm mb-1"></i> </p>
                      </div>
-->
                    </div>
<!--
                    <div class="col-6 col-md-12 col-xl-7">
                      <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                    </div>
-->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Total Teachers</h6>
<!--
                    <div class="dropdown mb-2">
                      <button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i> </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a> </div>
                    </div>
-->
                  </div>
                     <?php
                    $sql = "select * from peters_teachers";
                    $sql_query = mysqli_query( $conn, $sql );
                    $num_query = mysqli_num_rows( $sql_query );
                    ?>
                  <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                      <h3 class="mb-2"><?php echo $num_query; ?></h3>
<!--
                      <div class="d-flex align-items-baseline">
                        <p class="text-danger"> <span>-2.8%</span> <i data-feather="arrow-down" class="icon-sm mb-1"></i> </p>
                      </div>
-->
                    </div>
<!--
                    <div class="col-6 col-md-12 col-xl-7">
                      <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
                    </div>
-->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
<!--
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Growth</h6>
                    <div class="dropdown mb-2">
                      <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i> </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2"> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a> </div>
                    </div>
                  </div>
-->
                  <div class="row">
<!--
                    <div class="col-6 col-md-12 col-xl-5">
                      <h3 class="mb-2">89.87%</h3>
                      <div class="d-flex align-items-baseline">
                        <p class="text-success"> <span>+2.8%</span> <i data-feather="arrow-up" class="icon-sm mb-1"></i> </p>
                      </div>
                    </div>
-->
<!--
                    <div class="col-6 col-md-12 col-xl-7">
                      <div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
                    </div>
-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      
<!--
      <div class="row">
        <div class="col-lg-7 col-xl-8 stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline mb-2">
                <h6 class="card-title mb-0">Projects</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i> </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7"> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a> <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a> </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th class="pt-0">#</th>
                      <th class="pt-0">Project Name</th>
                      <th class="pt-0">Start Date</th>
                      <th class="pt-0">Due Date</th>
                      <th class="pt-0">Status</th>
                      <th class="pt-0">Assign</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>NobleUI jQuery</td>
                      <td>01/01/2021</td>
                      <td>26/04/2021</td>
                      <td><span class="badge badge-danger">Released</span></td>
                      <td>Leonardo Payne</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>NobleUI Angular</td>
                      <td>01/01/2021</td>
                      <td>26/04/2021</td>
                      <td><span class="badge badge-success">Review</span></td>
                      <td>Carl Henson</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>NobleUI ReactJs</td>
                      <td>01/05/2021</td>
                      <td>10/09/2021</td>
                      <td><span class="badge badge-info-muted">Pending</span></td>
                      <td>Jensen Combs</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>NobleUI VueJs</td>
                      <td>01/01/2021</td>
                      <td>31/11/2021</td>
                      <td><span class="badge badge-warning">Work in Progress</span></td>
                      <td>Amiah Burton</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>NobleUI Laravel</td>
                      <td>01/01/2021</td>
                      <td>31/12/2021</td>
                      <td><span class="badge badge-danger-muted text-white">Coming soon</span></td>
                      <td>Yaretzi Mayo</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>NobleUI NodeJs</td>
                      <td>01/01/2021</td>
                      <td>31/12/2021</td>
                      <td><span class="badge badge-primary">Coming soon</span></td>
                      <td>Carl Henson</td>
                    </tr>
                    <tr>
                      <td class="border-bottom">3</td>
                      <td class="border-bottom">NobleUI EmberJs</td>
                      <td class="border-bottom">01/05/2021</td>
                      <td class="border-bottom">10/11/2021</td>
                      <td class="border-bottom"><span class="badge badge-info-muted">Pending</span></td>
                      <td class="border-bottom">Jensen Combs</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
-->
      <!-- row --> 
      
    </div>
    

<?php  
        } else { header("location:index.php");}
         include("common/footer.php"); 
?>
   