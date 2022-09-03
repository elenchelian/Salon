<?php
require_once 'pdo.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "salon");
if ( isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = md5($password);
    $query = "SELECT * FROM admin_user WHERE email='$username'and password='$hash'";
    $result = mysqli_query($conn,$query) ;
    $rows = mysqli_num_rows($result);
    $getval = $result->fetch_assoc();
        if($rows==1){
        $_SESSION['admin_email'] = $username;
        $_SESSION['id'] = $getval['id'];
        // $_SESSION['getpoint'] = $getval['reward_points'];

        header("Location: admin_dashboard.php");
         }else{
        echo'<script>alert("Your Username and Password is Invalid")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sai Selva Salon Login</title>
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

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Sai Selva Salon Login</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Admin Account</h5>
                    <p class="text-center small">Enter your Email & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation"  method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email Address</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="username" required>
                        <div class="invalid-feedback">Please enter your Email Address.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                        <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control" id="password" required>
                        <span class="input-group-text" ><i class="bi bi-eye-slash" id="Passwordt" ></i></span>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> -->
                    <div class="col-12">
                      <button class="btn btn-danger w-100" type="submit">Login</button>
                    </div>
                    <!-- <div class="col-12">
                      <p class="text-center small">Don't have account? <a href="pages-register.php">Create an account</a></p>
                      <p class="text-center small">Bring me to the <a href="index.php">Main Page</a></p>
                    </div> -->


                  </form>

                  <script>
                      const togglePassword = document.querySelector('#Passwordt');
                      const password = document.querySelector('#Password');

                      togglePassword.addEventListener('click', function (e) {
                      // toggle the type attribute
                      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                      password.setAttribute('type', type);
                      // toggle the eye slash icon
                      this.classList.toggle('bi bi-eye');
                      });

                      const togglePassword2 = document.querySelector('#Cpasswordt');
                      const password2 = document.querySelector('#Cpassword');

                      togglePassword2.addEventListener('click', function (e) {
                      // toggle the type attribute
                      const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
                      password2.setAttribute('type', type);
                      // toggle the eye slash icon
                      this.classList.toggle('bi bi-eye');
                      });
                      </script>
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
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
