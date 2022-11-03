<?php
require_once 'pdo.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "salon");

if ( isset($_POST['service_name']) && isset($_POST['service_date']) && isset($_POST['service_time']) && isset($_POST['service_phone_num'])
 && isset($_POST['service_bank']) && isset($_POST['service_card_num']) && isset($_POST['service_card_date'])&& isset($_POST['service_card_year'])
&& isset($_POST['service_card_code']) && isset($_POST['service_deposit'])
) {


    $service_name = $_POST['service_name'];
    $service_date = $_POST['service_date'];
    $service_time = $_POST['service_time'];
    $service_phone_num = $_POST['service_phone_num'];
    $service_bank = $_POST['service_bank'];
    $service_card_num = $_POST['service_card_num'];
    $service_card_date = $_POST['service_card_date'];
    $service_card_year = $_POST['service_card_year'];
    $service_card_code = $_POST['service_card_code'];
    $service_deposit = $_POST['service_deposit'];;
    $firstname = $_POST['firstname'];
    $email = $_SESSION["email"];

    $sql = "SELECT * FROM booking WHERE booking_date='$service_date' and booking_time='$service_time' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 2) {
      while ($row = mysqli_fetch_assoc($result)) {

        header("Location: booking_full.php");
      }
    }else{
      $stmt = $pdo->prepare("INSERT INTO booking (id,firstname,booking_email,booking_service,booking_date,booking_time,booking_phone_num,booking_bank,booking_card_num,booking_card_date,booking_card_year,booking_card_code,booking_deposit,booking_status)
      VALUES('id','$firstname','$email','$service_name','$service_date','$service_time','$service_phone_num','$service_bank','$service_card_num','$service_card_date','$service_card_year','$service_card_code','$service_deposit','pending')");
      $stmt->execute();

    echo'<script>alert("Your Booking Has been submited")</script>';
    header("Location: dashboard.php");
    return;
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">



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

            <span class="d-none d-md-block dropdown-toggle ps-2" name="firstname"><?php echo $row['firstname']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $row['firstname']; ?></h6>
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
      <h1>Reservation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Book Appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="center">
      <div class="container" >

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="column">

            <form class="row g-3" method="post" onsubmit="return CheckPassword()">
              <div class="col-md-12">

                <label for="inputName5" class="form-label">Select Your Service</label>
                <select class="form-select" aria-label="Default select example" name='service_name'>
                  <?php
                 $sql = "SELECT * FROM service";
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0) {
                   while ($row = mysqli_fetch_assoc($result)) {
                 ?>
                <option value="<?php echo $row['service_name']; ?>"><?php echo $row['service_name']; ?></option>
                <!-- <input type="text" class="form-control" id="inputDate" name="service_price" value="<?php echo $row['service_price']; ?>" hidden> -->

                <?php
                  }
                }
                ?>

                </select>


              </div>

              <?php
             $sql = "SELECT * FROM user WHERE email='{$_SESSION["email"]}'";
             $result = mysqli_query($conn, $sql);
             $Date =date('Y-m-d');
             if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
             ?>
               <input type="text" class="form-control" id="inputDate" name="firstname" value="<?php echo $row['firstname']; ?>" hidden>
               <?php
                 }
               }
               ?>



              <div class="col-md-6">
                <label for="inputDate" class="form-label">Date</label>
                <!-- <input type="date" class="form-control" id="inputDate" min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime($Date. ' + 7 days')); ?>" name="service_date" data-input required> -->
                <input id="date1"   class="form-control"  name="service_date" placeholder="MM/DD/YYYY" data-input required />
                <div class="invalid-feedback">Please, Select Your Date</div>
              </div>



              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
              <!--  Flatpickr  -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>



              <!-- <div class="col-md-6">
                <label for="inputTime" class="form-label">Time</label>
                <input type="time" class="form-control" id="inputTime" min="09:00" max="21:00" name="service_time" required>
                <div class="invalid-feedback">Please, Select Your Time</div>
              </div> -->
              <div class="col-md-6">
                <label for="inputTime" class="form-label">Time</label>
                <select class="form-select" aria-label="Default select example" name="service_time" required>
                  <option value="9:00 a.m">9:00 a.m</option>
                  <option value="9:30 a.m">9:30 a.m</option>
                  <option value="10:00 a.m">10:00 a.m</option>
                  <option value="10:30 a.m">10:30 a.m</option>
                  <option value="11:00 a.m">11:00 a.m</option>
                  <option value="11:30 a.m">11:30 a.m</option>
                  <option value="12:00 p.m">12:00 p.m</option>
                  <option value="12:30 p.m">12:30 p.m</option>
                  <option value="1:00 p.m">1:00 p.m</option>
                  <option value="1:30 p.m">1:30 p.m</option>
                  <option value="2:00 p.m">2:00 p.m</option>
                  <option value="2:30 p.m">2:30 p.m</option>
                  <option value="3:00 p.m">3:00 p.m</option>
                  <option value="3:30 p.m">3:30 p.m</option>
                  <option value="4:00 p.m">4:00 p.m</option>
                  <option value="4:30 p.m">4:30 p.m</option>
                  <option value="5:00 p.m">5:00 p.m</option>
                  <option value="5:30 p.m">5:30 p.m</option>
                  <option value="6:00 p.m">6:00 p.m</option>
                  <option value="6:30 p.m">6:30 p.m</option>
                  <option value="7:00 p.mv">7:00 p.m</option>
                  <option value="7:30 p.m">7:30 p.m</option>
                  <option value="8:00 p.m">8:00 p.m</option>
                  <option value="8:30 p.m">8:30 p.m</option>
                  <option value="9:00 p.m">9:00 p.m</option>
                </select>
              </div>

              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="inputPhoneNumber" name="service_phone_num" required>
                  <div class="invalid-feedback">Please, Enter your Phone Number</div>
              </div>

              <div class="col-12">
                <label class="col-sm-2 col-form-label">Select Bank</label>
                <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" name="service_bank" required>
                    <option value="Maybank">Maybank</option>
                    <option value="Cimb">Cimb</option>
                    <option value="BankIslam">BankIslam</option>
                  </select>
                </div>
              </div>


              <div class="col-md-6">
                <label for="inputCardNumber" class="form-label">Card Number</label>
                <input type="number" class="form-control" id="inputCardNumber" name="service_card_num" required>
                <div class="invalid-feedback">Please, Enter your Card Number</div>
              </div>
              <div class="col-md-2">
                <label for="inputState" class="form-label">Exp Date</label>
                <select class="form-select" aria-label="Default select example" name="service_card_date" required>
                  <option value="January">January</option>
                  <option value="February">February</option>
                  <option value="March">March</option>
                  <option value="April">April</option>
                  <option value="May">May</option>
                  <option value="June">June</option>
                  <option value="July">July</option>
                  <option value="August">August</option>
                  <option value="September">September</option>
                  <option value="October">October</option>
                  <option value="November">November</option>
                  <option value="December">December</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="inputZip" class="form-label">Year</label>
                <select class="form-select" aria-label="Default select example" name="service_card_year" required>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                  <option value="2031">2031</option>
                  <option value="2032">2032</option>
                  <option value="2033">2033</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="inputSecurityCode" class="form-label">Security Code</label>
                <input type="number" class="form-control" id="inputSecurityCode" name="service_card_code" required>
                <div class="invalid-feedback">Please, Enter your Security Code</div>
              </div>

              <div class="col-12">
                <label for="inputdeposit" class="form-label">Please pay a Deposit. (min:RM 20)</label>
                <input type="number" class="form-control" id="service_deposit" name="service_deposit" required>
                <div class="invalid-feedback">Please, Enter your Deposit Amount</div>
              </div>


              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form>

          </div>
        </div>
        </div>
      </div>
    </section>

    <script>
            $("#date1").flatpickr({
        minDate: "today",
        maxDate: new Date().fp_incr(7),
        enableTime: false,
        dateFormat: "m-d-Y",

        // maxDate: "15.12.2017"
        "disable": [
          function(date) {
             return (date.getDay() === 0 || date.getDay() === 6);  // disable weekends
          }
        ],
        "locale": {
          "firstDayOfWeek": 1 // set start day of week to Monday
        }
        });


        // const picker = document.getElementById('inputDate');
        // picker.addEventListener('input', function(e){
        //   var day = new Date(this.value).getUTCDay();
        //   if([6,0].includes(day)){
        //     e.preventDefault();
        //     this.value = '';
        //     alert('Weekends not allowed');
        //   }
        // });

        function CheckPassword()
        {
          var phonenum = document.getElementById('inputPhoneNumber').value;
          var cardnum = document.getElementById('inputCardNumber').value;
          var cardcode = document.getElementById('inputSecurityCode').value;
          var deposit = document.getElementById('service_deposit').value;

          if(phonenum.length<10 ||phonenum.length>11){
            alert("Please make sure entered phone number is valid.")
            return false;
          }
          if(cardnum.length!=16){
            alert("Please make sure entered Debit Card is valid.")
            return false;
          }
          if(cardcode.length!=3){
            alert("Please make sure entered Security Code is valid.")
            return false;
          }
          if(deposit<20){
            alert("Please pay deposit more than RM20")
            return false;
          }


        }

    </script>

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
