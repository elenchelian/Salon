<?php
require_once 'pdo.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "salon");

// if ( isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['address']) ) {
//
//     $FirstName = $_POST['FirstName'];
//     $LastName = $_POST['LastName'];
//     $Password = $_POST['Password'];
//     $hash = md5($Password);
//     $Username = $_POST['Username'];
//     $Email = $_POST['Email'];
//     $Gender = $_POST['Gender'];
//     $Address = $_POST['Address'];
//
//     $stmt = $pdo->prepare("INSERT INTO user (id,firstname,lastname,username,email,gender,address,password,reward_points)VALUES('id','$FirstName','$LastName','$Username','$Email','$Gender','$Address','$hash','175')");
//     $stmt->execute();
//
//
//   header("Location: pages-login.php");
//   return;
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">My Account</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <?php

      $sql = "SELECT * FROM user WHERE email='{$_SESSION["email"]}'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->





        <li class="nav-item dropdown pe-3">


          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['username']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $row['username']; ?></h6>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="edit_profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <button class="dropdown-item d-flex align-items-center" onclick="JSalert()">

                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </button>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

          </ul><!-- End Profile Dropdown Items -->

        </li><!-- End Profile Nav -->

      </ul>
      <?php
        }
      }
      ?>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Reservation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="book_appoinment_page.php">
              <i class="bi bi-circle"></i><span>Book Appointment</span>
            </a>
          </li>
          <li>
            <a href="appoinment_status_page.php">
              <i class="bi bi-circle"></i><span>Appointment Status</span>
            </a>
          </li>
          <li>
            <a href="appoinment_history_page.php">
              <i class="bi bi-circle"></i><span>Appointment History</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#reward-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gift"></i><span>Claim Reward</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="reward-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="reward_page.php">
              <i class="bi bi-circle"></i><span>Reward Store</span>
            </a>
          </li>
          <li>
            <a href="point_history.php">
              <i class="bi bi-circle"></i><span>Point History</span>
            </a>
          </li>
        </ul>
      </li>



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>My Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="center">
          <div class="row">

            <div class="col-xl-8">

              <div class="card">
                <div class="card-body pt-3">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                    </li>



                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                    </li>

                  </ul>
                  <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                      <h5 class="card-title">Profile Details</h5>
                      <?php

                      $sql = "SELECT * FROM user WHERE email='{$_SESSION["email"]}'";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">First Name</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['firstname']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Last Name</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['lastname']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Username</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['username']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['email']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Gender</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['gender']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Address</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['address']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Reward Points</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['reward_points']; ?></div>
                      </div>

                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                      <!-- Profile Edit Form -->
                      <form action="profile_update.php?firstname="+firstname+"&lastname="+lastname+"&username="+username+"&address="+address+"" >


                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="firstname" type="text" class="form-control" id="firstname" value="<?php echo $row['firstname']; ?>" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="company" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $row['lastname']; ?>" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Job" class="col-md-4 col-lg-3 col-form-label">Username</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="username" type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">Address</label>
                          <div class="col-md-8 col-lg-9">
                            <textarea name="address" class="form-control" id="address" style="height: 100px" required><?php echo $row['address']; ?> </textarea>
                          </div>
                        </div>

                        <div class="text-center">
                          <button  type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        <?php
                          }
                        }
                        ?>
                      </form><!-- End Profile Edit Form -->

                    </div>

                    <div class="tab-pane fade pt-3" id="profile-change-password">
                      <!-- Change Password Form -->
                      <form>

                        <div class="row mb-3">
                          <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="password" type="password" class="form-control" id="currentPassword">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                          </div>
                        </div>

                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                      </form><!-- End Change Password Form -->

                    </div>

                  </div><!-- End Bordered Tabs -->

                </div>
              </div>

            </div>


        </div>
        </div>

    </section>

  </main><!-- End #main -->
  <script >
  function editfunction(id){
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var username = document.getElementById('username').value;
    var address = document.getElementById('address').value;

    let reason = confirm("Are you sure want save the changes ?"+username+"--"+address+"");
    if (reason == true) {
      // alert("trest");
      window.location.href= "profile_update.php?firstname="+firstname+"&lastname="+lastname+"&username="+username+"&address="+address+"";
      return true;
    }
  }
  </script>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body>

</html>
