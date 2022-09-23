<?php
require_once 'pdo.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "salon");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sai Selva Salon</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy - v1.1.0
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Sai Selva Salon<span>.</span></h1>

      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#service">Service</a></li>

          <li><a href="#contact">Contact Us</a></li>

        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="pages-login.php">Book a Reservation</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Life is too short<br>to have boring hair.</h2>
          <p data-aos="fade-up" data-aos-delay="100">“I think the most important thing a woman can have – next to her talent, of course, – is her hairdresser.” ~ Joan Crawford</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="pages-login.php" class="btn-book-a-table">Book a Reservation</a>
            <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>Book a Reservation</h4>
              <p>+6012 765 4972</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p>
                Our main focus is on quality and hygine.Our Parlour is well equiped with advanced technology equipment and provides best quality service.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Imported organic based shampoo and hair dye with 0 % chemical.</li>
                <li><i class="bi bi-check2-all"></i> Well experience and certifed barbers with amature levels and Proffesional levels </li>
                <li><i class="bi bi-check2-all"></i> Our parlour have high class lounge with a coffee corner for the customers. We also have the latest fashion design magazines from modern salon and American Salon Magazine.</li>
              </ul>
              <p>
                Our main goals of parlour is to satisfy our customers with healty hair treatment with organic shampoos and dye. We wants our customers to happy with our service.
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/about-2.jfif" class="img-fluid" alt="">
                <a href="https://www.youtube.com/watch?v=-FnrCZJw6TE" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Menu Section ======= -->
    <section id="service" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Service</h2>
          <p>Check Our <span>Service</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-hair">
              <h4>Hair Care</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-skin">
              <h4>Skin Care</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-nail">
              <h4>Nail Care</h4>
            </a>
          </li><!-- End tab nav item -->



        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-hair">

            <div class="tab-header text-center">
              <p>Service Category</p>
              <h3>Hair Care</h3>
            </div>

            <div class="row gy-5">
              <?php
             $sql = "SELECT * FROM service where service_cat='Hair_Care'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
             ?>
              <div class="col-lg-4 menu-item">
                <h4><?php echo $row['service_name']; ?></h4>
                <p class="ingredients">
                  <?php echo $row['service_desc']; ?>
                </p>
                <p class="price">
                  RM<?php echo $row['service_price']; ?>
                </p>
              </div><!-- Menu Item -->
              <?php
                }
              }
              ?>

            </div>
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="menu-skin">

            <div class="tab-header text-center">
              <p>Service Category</p>
              <h3>Skin Care</h3>
            </div>

            <div class="row gy-5">
              <?php
             $sql = "SELECT * FROM service where service_cat='Skin_Care'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
             ?>
              <div class="col-lg-4 menu-item">
                <!-- <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a> -->
                <h4><?php echo $row['service_name']; ?></h4>
                <p class="ingredients">
                  <?php echo $row['service_desc']; ?>
                </p>
                <p class="price">
                  RM<?php echo $row['service_price']; ?>
                </p>
              </div><!-- Menu Item -->
              <?php
                }
              }
              ?>
            </div>
          </div><!-- End Breakfast Menu Content -->

          <div class="tab-pane fade" id="menu-nail">

            <div class="tab-header text-center">
              <p>Service Category</p>
              <h3>Nail Care</h3>
            </div>

            <div class="row gy-5">
              <?php
             $sql = "SELECT * FROM service where service_cat='Nail_Care'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
             ?>
              <div class="col-lg-4 menu-item">
                <!-- <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a> -->
                <h4><?php echo $row['service_name']; ?></h4>
                <p class="ingredients">
                  <?php echo $row['service_desc']; ?>
                </p>
                <p class="price">
                  RM<?php echo $row['service_price']; ?>
                </p>
              </div><!-- Menu Item -->
              <?php
                }
              }
              ?>

            </div>
          </div><!-- End Lunch Menu Content -->



        </div>

      </div>
    </section><!-- End Menu Section -->



    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1" class="purecounter"></span>
              <p>Collaborators</p>
            </div>
          </div><!-- End Stats Item -->
        </div>

      </div>
    </section><!-- End Stats Counter Section -->



    <!-- ======= Gallery Section ======= -->
    <!-- <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>gallery</h2>
          <p>Check <span>Our Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-1.jfif"><img src="assets/img/gallery/gallery-1.jfif" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-5.png"><img src="assets/img/gallery/gallery-5.png" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-7.jpg"><img src="assets/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-8.jpeg"><img src="assets/img/gallery/gallery-8.jpeg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> -->
    <!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.4717020796256!2d101.97556935092604!3d2.6747072566208043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cde6d48e4796cb%3A0x2c4ddd010d909a75!2sJalan%20SJ%208%2F4%2C%20Bandar%20Seremban%20Selatan%2C%2071450%20Seremban%2C%20Negeri%20Sembilan!5e0!3m2!1sen!2smy!4v1660575173506!5m2!1sen!2smy" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>628, Jalan SJ 8/4, Taman Seremban Jaya,<br>70450,seremban,Negeri Sembilan</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>ss_salon@gmail.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+6012 765 4972</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sat:</strong> 9.00AM - 9.00PM;<br>
                  <strong>Sunday:</strong> Closed
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <!-- <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
          <div class="row">
            <div class="col-xl-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form> -->
        <!--End Contact Form -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
              <p>628, Jalan SJ 8/4, Taman Seremban Jaya,<br>70450,seremban,Negeri Sembilan</p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +6012 765 4972<br>
              <strong>Email:</strong> ss_salon@gmail.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> 9.00AM - 9.00PM;<br>
                <strong>Sunday:</strong> Closed
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/saiselvasalon/?igshid=YmMyMTA2M2Y%3D" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://wa.me/+6014902202854" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

      </div>
    </div>



  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
