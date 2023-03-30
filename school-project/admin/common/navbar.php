<?php
if(!empty($_SESSION[ "login_id" ]) && $_SESSION[ "login_type" ]=='admin')
{
    $sql_admin = "select * from peters_admin where admin_id='".$_SESSION[ "login_id" ]."' and login_type='admin'";
    $query_admin = mysqli_query($conn,$sql_admin);
    $data_admin = mysqli_fetch_assoc($query_admin);
?>

<nav class="navbar"> <a href="#" class="sidebar-toggler"> <i data-feather="menu"></i> </a>
      <div class="navbar-content">
<!--
        <form class="search-form">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"> <i data-feather="search"></i> </div>
            </div>
            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
          </div>
        </form>
-->
            <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile"> <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="https://via.placeholder.com/30x30" alt="profile"> </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                <div class="dropdown-header d-flex flex-column align-items-center">
                    <div class="figure mb-3"> <img src="https://via.placeholder.com/80x80" alt=""> </div>
                    <div class="info text-center">
                    <p class="name font-weight-bold mb-0"><?php echo ucwords($data_admin['admin_name']); ?></p>
                    <p class="email text-muted mb-3"><?php echo $data_admin['admin_email_id']; ?></p>
                    </div>
                </div>
                <div class="dropdown-body">
                    <ul class="profile-nav p-0 pt-3">
<!--
                    <li class="nav-item"> <a href="pages/general/profile.html" class="nav-link"> <i data-feather="user"></i> <span>Profile</span> </a> </li>
                    <li class="nav-item"> <a href="javascript:;" class="nav-link"> <i data-feather="edit"></i> <span>Edit Profile</span> </a> </li>
                    <li class="nav-item"> <a href="javascript:;" class="nav-link"> <i data-feather="repeat"></i> <span>Switch User</span> </a> </li>
-->
                    <li class="nav-item"> <a href="logout.php" class="nav-link"> <i data-feather="log-out"></i> <span>Log Out</span> </a> </li>
                    </ul>
                </div>
                </div>
            </li>
            </ul>
      </div>
    </nav>
<?php 
}
if(!empty($_SESSION[ "login_id" ]) && $_SESSION[ "login_type" ]=='teachers')
{
    $sql_teachers = "select * from peters_teachers where teachers_id='".$_SESSION[ "login_id" ]."' and login_type='teachers'";
    $query_teachers = mysqli_query($conn,$sql_teachers);
    $data_teachers = mysqli_fetch_assoc($query_teachers);
?>

<nav class="navbar"> <a href="#" class="sidebar-toggler"> <i data-feather="menu"></i> </a>
      <div class="navbar-content">
<!--
        <form class="search-form">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"> <i data-feather="search"></i> </div>
            </div>
            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
          </div>
        </form>
-->
            <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile"> <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="https://via.placeholder.com/30x30" alt="profile"> </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                <div class="dropdown-header d-flex flex-column align-items-center">
                    <div class="figure mb-3"> <img src="https://via.placeholder.com/80x80" alt=""> </div>
                    <div class="info text-center">
                    <p class="name font-weight-bold mb-0"><?php echo ucwords($data_teachers['teachers_name']); ?></p>
                    <p class="email text-muted mb-3"><?php echo $data_teachers['teachers_email_id']; ?></p>
                    </div>
                </div>
                <div class="dropdown-body">
                    <ul class="profile-nav p-0 pt-3">
<!--
                    <li class="nav-item"> <a href="pages/general/profile.html" class="nav-link"> <i data-feather="user"></i> <span>Profile</span> </a> </li>
                    <li class="nav-item"> <a href="javascript:;" class="nav-link"> <i data-feather="edit"></i> <span>Edit Profile</span> </a> </li>
                    <li class="nav-item"> <a href="javascript:;" class="nav-link"> <i data-feather="repeat"></i> <span>Switch User</span> </a> </li>
-->
                    <li class="nav-item"> <a href="logout.php" class="nav-link"> <i data-feather="log-out"></i> <span>Log Out</span> </a> </li>
                    </ul>
                </div>
                </div>
            </li>
            </ul>
      </div>
    </nav>
<?php 
}
if(!empty($_SESSION[ "login_id" ]) && $_SESSION[ "login_type" ]=='students')
{
    $sql_students = "select * from peters_student where student_id='".$_SESSION[ "login_id" ]."' and login_type='students'";
    $query_students = mysqli_query($conn,$sql_students);
    $data_students = mysqli_fetch_assoc($query_students);
    
      $sql_class = "select * from peters_class_name where class_id='".$data_students['student_class']."'";
      $sql_query_class = mysqli_query( $conn, $sql_class );
      $data_query_class = mysqli_fetch_assoc($sql_query_class);
?>

<nav class="navbar"> <a href="#" class="sidebar-toggler"> <i data-feather="menu"></i> </a>
      <div class="navbar-content">
<!--
        <form class="search-form">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"> <i data-feather="search"></i> </div>
            </div>
            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
          </div>
        </form>
-->
            <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile"> <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="https://via.placeholder.com/30x30" alt="profile"> </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                <div class="dropdown-header d-flex flex-column align-items-center">
                    <div class="figure mb-3"> <img src="https://via.placeholder.com/80x80" alt=""> </div>
                    <div class="info text-center">
                    <p class="name font-weight-bold mb-0"><?php echo ucwords($data_students['student_first_name'] .' '.$data_students['student_last_name']); ?></p>
                    <p class="email text-muted mb-3"><?php echo $data_query_class['class_name']; ?></p>
                    </div>
                </div>
                <div class="dropdown-body">
                    <ul class="profile-nav p-0 pt-3">
<!--
                    <li class="nav-item"> <a href="pages/general/profile.html" class="nav-link"> <i data-feather="user"></i> <span>Profile</span> </a> </li>
                    <li class="nav-item"> <a href="javascript:;" class="nav-link"> <i data-feather="edit"></i> <span>Edit Profile</span> </a> </li>
                    <li class="nav-item"> <a href="javascript:;" class="nav-link"> <i data-feather="repeat"></i> <span>Switch User</span> </a> </li>
-->
                    <li class="nav-item"> <a href="logout.php" class="nav-link"> <i data-feather="log-out"></i> <span>Log Out</span> </a> </li>
                    </ul>
                </div>
                </div>
            </li>
            </ul>
      </div>
    </nav>
<?php 
}
?>