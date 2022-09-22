<?php
require_once 'pdo.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "salon");

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
      <a href="dashboard.php" class="logo d-flex align-items-center">
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
              <a class="dropdown-item d-flex align-items-center" href="pages-login.php">
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
      <h1>Reward Store</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Reward Store</li>
          <li class="breadcrumb-item active">Rewards</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="center">
          <div class="row">
            <?php

            $sql = "SELECT * FROM user WHERE email='{$_SESSION["email"]}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <!-- Sales Card -->
            <div class="col-xl-3 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title" align="center">Reward Points</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-coin"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id=""><?php echo $row['reward_points']; ?></h6>
                      <input type="hidden" id="pointsid" value="<?php echo $row['reward_points']; ?>"></input>

                    </div>
                  </div>
                </div>
                <?php
                  }
                }
                ?>
              </div>
            </div><!-- End Sales Card -->


            <div class="pagetitle" id="menu-starters"style="">

              <div class="row gy-5" >
                <?php
                $sql = "SELECT * FROM reward_item where reward_point <='{$_SESSION["getpoint"]}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                 while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-lg-2 menu-item" >
                  <a href="<?php echo $row['reward_path']; ?>" class="glightbox"><img src="<?php echo $row['reward_path']; ?>" class="menu-img img-fluid" alt=""></a>
                  <div style="height:100px">
                  <h4 align="center" ><?php echo $row['reward_item']; ?></h4>
                  <h4 align="center" ><?php echo $row['reward_point']; ?></h4>
                  </div>
                  <div align="center">
                  <p class="price" align="center" >
                    <input type="hidden" id="getemail" value="<?php echo $_SESSION["email"]; ?>"></input>
                  </p>
                  <button href="" class="btn btn-outline-success" onclick="confirmFunction(<?php echo $row['id']; ?>)">Redeem</button>

                </div>

                </div><!-- Menu Item -->
                <?php
                  }
                }
                ?>
              </div>
            </div>


            <script>

            function confirmFunction(id) {
              var ids=id;
              var emails = document.getElementById('getemail').value;
              var pointsid = document.getElementById('pointsid').value;
              // var reward_point = document.getElementById('get_reward_point').value;

              let reason = confirm("Are you sure want to Redeem this item .");
              if (reason == true) {

                window.location.href= "redeem_reward.php?update="+ids+"&email="+emails+"&point="+pointsid+"";
              }


            }
            </script>


    </section>

  </main><!-- End #main -->


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
