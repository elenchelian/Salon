<?php
require_once 'pdo.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "salon");

if ( isset($_POST['password']) && isset($_POST['newpassword'])) {

    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $hash = md5($password);
    $newhash = md5($newpassword);
    $query = "SELECT * FROM admin_user WHERE email='{$_SESSION["admin_email"]}'and password='$hash'";
    $result = mysqli_query($conn,$query) ;
    $rows = mysqli_num_rows($result);
    $getval = $result->fetch_assoc();
        if($rows==1){
        $sql_Update ="UPDATE admin_user SET password='$newhash' WHERE email='{$_SESSION["admin_email"]}'";
        $result = $conn-> query($sql_Update);

        header("Location: Jquery/admin_changepass.php");
         }else{
        echo'<script>alert("Your Current Password is incorrect !!")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

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
      <a href="admin_dashboard.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">My Admin Account</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">

      <ul class="d-flex align-items-center">



        <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">



            <li class="nav-item dropdown">
              <?php

              $sql = "SELECT COUNT(*)FROM booking WHERE booking_status='pending';";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number"><?php echo $row['COUNT(*)']; ?></span>
              </a><!-- End Notification Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="dropdown-header">
                  You have <?php echo $row['COUNT(*)']; ?> new notifications
                  <a href="pending_list.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>


                <li class="notification-item">
                  <i class="bi bi-info-circle text-primary"></i>
                  <div>
                    <h4>Pending Reservation</h4>
                    <p>You have <?php echo $row['COUNT(*)']; ?> reservation on pending</p>
                    <p>that needed to be approved</p>
                  </div>
                </li>



              </ul><!-- End Notification Dropdown Items -->
              <?php
                }
              }
              ?>
            </li><!-- End Notification Nav -->





          </ul>
        </nav><!-- End Icons Navigation -->
        <?php

        $sql = "SELECT * FROM admin_user WHERE email='{$_SESSION["admin_email"]}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>


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
              <a class="dropdown-item d-flex align-items-center" href="admin_edit_profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item d-flex align-items-center" href="admin_login.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
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
        <a class="nav-link collapsed" href="admin_dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#manage_admin" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-plus"></i><span>Manage Admin</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="manage_admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_admin.php">
              <i class="bi bi-circle"></i><span>Add Admin</span>
            </a>
          </li>
          <li>
            <a href="admin_user_list.php">
              <i class="bi bi-circle"></i><span>Admin List</span>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#manage_service" data-bs-toggle="collapse" href="#">
          <i class="bi bi-scissors"></i><span>Manage Service</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="manage_service" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_service.php">
              <i class="bi bi-circle"></i><span>Add Service</span>
            </a>
          </li>
          <li>
            <a href="service_list.php">
              <i class="bi bi-circle"></i><span>Service List</span>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#manage_reservation" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Manage Reservation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="manage_reservation" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pending_list.php">
              <i class="bi bi-circle"></i><span>List of Pending Reservation</span>
            </a>
          </li>
          <li>
            <a href="approved_booking.php">
              <i class="bi bi-circle"></i><span>List of Approved Reservation</span>
            </a>
          </li>
          <li>
            <a href="booking_canceled.php">
              <i class="bi bi-circle"></i><span>List of Cancellation</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#manage_reward" data-bs-toggle="collapse" href="#">
          <i class="bi bi-star"></i><span>Reward</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="manage_reward" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_reward.php">
              <i class="bi bi-circle"></i><span>Add Reward</span>
            </a>
          </li>
          <li>
            <a href="manage_reward.php">
              <i class="bi bi-circle"></i><span>Manage Reward</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#manage_payment" data-bs-toggle="collapse" href="#">
          <i class="bi bi-credit-card"></i><span>Payment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="manage_payment" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="payment_list.php">
              <i class="bi bi-circle"></i><span>Approve Payment</span>
            </a>
          </li>
          <li>
            <a href="complete_payment.php">
              <i class="bi bi-circle"></i><span>Completed Payment</span>
            </a>
          </li>
        </ul>
      </li>



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Admin Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Admin Dashboard</li>
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
                      <button class="nav-link active " data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                    </li>



                    <li class="nav-item">
                      <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                    </li>

                  </ul>
                  <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                      <h5 class="card-title">Profile Details</h5>
                      <?php

                      $sql = "SELECT * FROM admin_user WHERE email='{$_SESSION["admin_email"]}'";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Email</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['email']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Username</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['username']; ?></div>
                      </div>

                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                      <!-- Profile Edit Form -->
                      <form action="Jquery/admin_edit_profile.php?username="+username+"" >

                        <div class="row mb-3">
                          <label for="Job" class="col-md-4 col-lg-3 col-form-label">Username</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="username" type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" required>
                          </div>
                        </div>


                        <div class="text-center">
                          <button  type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                         <?php
                          }
                        }
                        ?>
                      </form>
                      <!-- < End Profile Edit Form -->

                    </div>

                    <div class="tab-pane fade pt-3" id="profile-change-password">
                      <!-- Change Password Form -->
                      <form method="post" onsubmit="return CheckPassword()">

                        <div class="row mb-3">
                          <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="password" type="password" class="form-control" id="password">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="newpassword" type="password" class="form-control" id="newpassword">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                          </div>
                        </div>

                        <div class="text-center">
                          <button type="submit" class="btn btn-primary" >Change Password</button>
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
  function CheckPassword()
  {
    var passw = document.getElementById('newpassword').value;
    var passw2 = document.getElementById('renewPassword').value;
    var upper  =/[A-Z]/;
    var number = /[0-9]/;

    if(passw.length < 8 || passw.length > 20 || passw != passw2 || !number.test(passw) || !upper.test(passw)) {
      if(passw.length<8){
        alert("Please make sure password is longer than 8 characters.")
        return false;
      }
      if(passw.length>20){
        alert("Please make sure password is shorter than 20 characters.")
        return false;
      }
      if(passw != passw2){
        alert("Please make sure passwords match.")
        return false;
      }
      if(!number.test(passw)){
        alert("Please make sure password includes a digit")
        return false;
      }
      if(!upper.test(passw)) {
        alert("Please make sure password includes an uppercase letter.")
        return false;
      }
    }
  }
  </script>



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>



</body>

</html>
