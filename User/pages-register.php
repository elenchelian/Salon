<?php
require_once 'pdo.php';
session_start();

if ( isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['Username']) && isset($_POST['Email'])
 && isset($_POST['Gender']) && isset($_POST['Address']) && isset($_POST['Password'])) {

    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Password = $_POST['Password'];
    $hash = md5($Password);
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Gender = $_POST['Gender'];
    $Address = $_POST['Address'];

    $stmt = $pdo->prepare("INSERT INTO user (id,firstname,lastname,username,email,gender,address,password)VALUES('id','$FirstName','$LastName','$Username','$Email','$Gender','$Address','$hash')");
    $stmt->execute();


  header("Location: pages-login.php");
  return;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sai Selva Salon Sign Up</title>
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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Sign Up to Sai Selva Sallon </span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-2 needs-validation" method="post" onsubmit="return CheckPassword()">
                    <div class="col-12">
                      <label for="FirstName" class="form-label">First Name</label>
                      <input type="text" name="FirstName" class="form-control" id="FirstName" required>
                      <div class="invalid-feedback">Please, enter your First name!</div>
                    </div>

                    <div class="col-12">
                      <label for="LastName" class="form-label">Last Name</label>
                      <input type="text" name="LastName" class="form-control" id="LastName" required>
                      <div class="invalid-feedback">Please, enter your Last name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="Username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="Email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>


                      <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="Gender" id="Male" value="Male" >
                          <label class="form-check-label" for="Male">
                            Male
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="Gender" id="Female" value="Female">
                          <label class="form-check-label" for="Female">
                            Female
                          </label>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="Address" class="form-control" id="address" required>
                        <div class="invalid-feedback">Please, enter your Address !</div>
                      </div>


                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <input type="password" name="Password" class="form-control" id="Password" required/>
                        <span class="input-group-text" ><i class="bi bi-eye-slash" id="Passwordt" ></i></span>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourConfirmPassword" class="form-label">Confirm Password</label>
                        <div class="input-group has-validation">
                          <input type="password" name="Cpassword" class="form-control" id="Cpassword" required>
                          <span class="input-group-text" ><i class="bi bi-eye-slash" id="Cpasswordt"></i></span>
                          <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div> -->
                    <div class="col-12">
                      <button class="btn btn-danger w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="text-center small">Already have an account? <a href="pages-login.html">Log in</a></p>
                    </div>
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

                      function CheckPassword()
                      {
                        var passw = document.getElementById('Password').value;
                        var passw2 = document.getElementById('Cpassword').value;
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
