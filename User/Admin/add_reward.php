<?php
require_once 'pdo.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "salon");

if(isset($_POST["fileToUpload"]) && isset($_POST["reward_name"]) && isset($_POST["reward_point"])){
  if($_FILES['fileToUpload']['size'] != 0){

      $reward_name = $_POST["reward_name"];
      $reward_point = $_POST["reward_point"];
      $file = $_FILES['fileToUpload'];
      $filename1 = $_FILES['fileToUpload']['name'];

      $filename ="assets/reward_item/$filename1";
      // if( move_uploaded_file($file["tmp_name"],"../assets/reward_item/".$file["name"]))
// {
          $stmt = $pdo->prepare("INSERT INTO reward_item (id,reward_item,reward_point,reward_path)VALUES('id','$reward_name','$reward_point','$filename')");
          $stmt->execute();


        header("Location: manage_reward.php");
        return;
      // }
      }
    }

//       if(isset($_POST["fileToUpload"]) && isset($_POST["reward_name"]) && isset($_POST["reward_point"])){
//         // echo 'alert("Welcome to Geeks for Geeks")';
//
//   if($_FILES['fileToUpload']['size'] != 0){
//     echo "Filename: " . $_FILES['fileToUpload']['name']."<br>";
//     echo "Type : " . $_FILES['fileToUpload']['type'] ."<br>";
//     echo "Size : " . $_FILES['fileToUpload']['size'] ."<br>";
//     echo "Temp name: " . $_FILES['fileToUpload']['tmp_name'] ."<br>";
//     echo "Error : " . $_FILES['fileToUpload']['error'] . "<br>";
//       $uploaddir = '../assets/reward_item/';
//       $filename  = basename($_FILES['fileToUpload']['name']);
//       $extension = pathinfo($filename, PATHINFO_EXTENSION);
//       $date = date('m-d-Y h-i-s a');
//       $new = "$date.$extension";
//       $uploadfile = $uploaddir . $new;
//
//       $reward_name = $_POST["reward_name"];
//       $reward_point = $_POST["reward_point"];
//       $file = $_FILES["uploadfile"];
//
//
//       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$uploadfile")){
//
//         $_SESSION["message"] = "";
//
//         // $stmt = $pdo->query('SELECT serviceid FROM `services` WHERE name="'.$_SESSION["servicename"].'";');
//         // $service_id = $stmt->fetch(PDO::FETCH_ASSOC);
//
//         $stmt = $pdo->prepare("INSERT INTO 'reward_item' ('id','reward_item','reward_point','reward_path') VALUES (:si, :d, :t, :f);");
//
//         $stmt->execute(array(
//           ':si' => 'id',
//           ':d' => $reward_name,
//           ':t' => $reward_point,
//           ':f' => $uploadfile,));
//
//         header("Location: manage_reward.php");
//       }else{
//         $_SESSION["message"] = "File upload unsuccessful.";
//         header("Location: admin_dashboard.php");
//       }
//
//       exit();
//   }else{
//       $_SESSION["message"] = "Please select a file to upload.";
//       header("Location: admin_dashboard.php");
//       exit();
//   }
// }



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
          <li class="breadcrumb-item">Reward</li>
          <li class="breadcrumb-item active">Add Reward</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-11">
          <div class="row">

            <form class="row g-3" action="Jquery/add_reward_list.php" method="post" enctype="multipart/form-data">
              <div class="col-md-12">


              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Reward Name</label>
                <input type="text" class="form-control" id="reward_name" placeholder="Please, enter your reward name" name="reward_name" required>
                  <div class="invalid-feedback">Please, Enter your Service Name</div>
              </div>
              <br>


              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Reward Points</label>
                <input type="number" class="form-control" id="reward_point"  placeholder="Please, enter your reward points" name="reward_point" required>
                  <div class="invalid-feedback">Please, Enter your Service Price</div>
              </div>
              <br>

              <div class="col-12">
                <label for="inputPhoneNumber" class="form-label">Upload Your Image</label><br>
                  <input class="btn btn-primary" type="file" id="fileToUpload"  name="fileToUpload" accept="image/*">
                  <div class="invalid-feedback">Please, Enter your Service Price</div>
              </div>



              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form>


          </div>
          </div>
          </div>




    </section>

  </main><!-- End #main -->

  <script>

  function confirmFunction(id) {


    var filename = document.getElementById('file').value;

    let reason = confirm("Are you sure want to delete this reward "+ filename +" ." );


    if (reason == true) {

      // window.location.href= "Jquery/delete_reward.php?update="+ids+"";
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
