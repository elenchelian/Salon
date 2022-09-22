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
      <a href="dashboard.php" class="logo d-flex align-items-center">
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
                  <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
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
          <li class="breadcrumb-item">Payment</li>
          <li class="breadcrumb-item active">Approve Payment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <!-- <div class="row"> -->

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <?php
            if(isset($_GET['update'])){
            $id =$_GET['update'];

            $sql_select ="SELECT * from booking WHERE id='$id'";
            $result = mysqli_query($conn, $sql_select);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $booking_name=  $row['firstname'];
                $booking_service=  $row['booking_service'];
                $booking_email=  $row['booking_email'];
                $booking_date=  $row['booking_date'];
                $booking_time=  $row['booking_time'];
                $booking_phone=  $row['booking_phone_num'];
                $booking_deposit=  $row['booking_deposit'];

                $sql_select_price ="SELECT * from service WHERE service_name='$booking_service'";
                $result = mysqli_query($conn, $sql_select_price);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $totalprice = $row['service_price'];
                    $balance = $totalprice-$booking_deposit;


             ?>
            <form class="row g-3" method="post" >


              <div class="col-md-12">


              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="service_name" placeholder="Please, Enter your Service Name" name="service_name" value="<?php echo $booking_service; ?>" disabled>
                  <div class="invalid-feedback">Please, Enter your Service Name</div>
              </div>


              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" placeholder="Please, Enter your First Name" name="first_name" value="<?php echo $booking_name; ?>"disabled>
                  <div class="invalid-feedback">Please, Enter your Service Name</div>
              </div>

              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Booking Email</label>
                <input type="text" class="form-control" id="booking_email" placeholder="Please, Enter your First Name" name="booking_email" value="<?php echo $booking_email; ?>"disabled>
                  <div class="invalid-feedback">Please, Enter your Service Name</div>
              </div>

              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Booking Date</label>
                <input type="text" class="form-control" id="booking_date" placeholder="Please, Enter your First Name" name="booking_date" value="<?php echo $booking_date; ?>" disabled>
                  <div class="invalid-feedback">Please, Enter your Service Name</div>
              </div>

              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Booking Time</label>
                <input type="text" class="form-control" id="booking_time" placeholder="Please, Enter your First Name" name="booking_time" value="<?php echo $booking_time; ?>" disabled>
                  <div class="invalid-feedback">Please, Enter your Service Name</div>
              </div>

              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Booking Phone Number</label>
                <input type="text" class="form-control" id="booking_phone" placeholder="Please, Enter your First Name" name="booking_phone" value="<?php echo $booking_phone; ?>" disabled>
                  <div class="invalid-feedback">Please, Enter your Service Name</div>
              </div>

              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Booking Deposit</label>
                <input type="text" class="form-control" id="booking_deposit" placeholder="Please, Enter your First Name" name="booking_deposit" value="RM <?php echo $booking_deposit; ?>" disabled>
                  <div class="invalid-feedback">Please, Enter your Service Name</div>
              </div>

              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Balance Payment</label>
                <input type="text" class="form-control" id="booking_payment" placeholder="Please, Enter your First Name" name="booking_payment" value="RM <?php echo $balance; ?>"disabled>
                  <div class="invalid-feedback">Please, Enter your Service Name</div>
              </div>
              <br>
              <input type="text" class="form-control" id="total_pay" placeholder="Please, Enter your First Name" name="total_pay" value="<?php echo $totalprice; ?>"hidden>

              <div class="text-center">
                <!-- <button value="submit" onclick="confirmpayment(<?php echo $id; ?>)" class="btn btn-primary">Submit</button> -->
                <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
              </div>
            </form>


            <?php
                      }
                    }
                  }
                }
              }
             ?>

          </div>
          <button  class="btn btn-outline-success" onclick="confirmpayment(<?php echo $id; ?>)">Approve</button>

        </div>

      </div>




    </section>

    <script >

    function confirmpayment(id) {
      var ids= id;
      var payment = document.getElementById('total_pay').value;
      var email = document.getElementById('booking_email').value;
      var service = document.getElementById('service_name').value;
      let reason = confirm("Payment has compeleted for the booking "+ ids +" ." );
      if (reason == true) {
        window.location.href = "Jquery/complete_payment.php?update="+ids+"&payment="+payment+"&email="+email+"&service="+service+"";
      }
    }

    </script>


  </main><!-- End #main -->




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
