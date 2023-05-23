<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Project Evaluation & Management System </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v4.9.1
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  
  

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo me-auto"><a href="index.html">Green</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.php" class="logo me-auto"><img src="CMRIT logo.png"  ></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          
          <!--<li><a class="nav-link scrollto" href="#team">Team</a></li>-->
          <li class="dropdown"><a href="#"><span>Login/Register</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adminlogin.php">Admin Login</a></li>

              <li><a href="drclogin.php">DRC Login</a></li>
              
              <li><a href="stafflogin.php">Staff Login</a></li>
              
              
              <li class="dropdown"><a href="#"><span>Team Login</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="leadlogin.php">Team Leader Login</a></li>
                  <li><a href="memberlogin.php">Team Member login</a></li>
                  
                </ul>
              </li>
              <li><a href="student-registration.php">Team Registration</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="https://www.cmrit.ac.in/about-cmrit/">Contact</a></li>
         <!-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/cmrit.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">WELCOME TO COME -  <br> <span>COLLECT, ORGANIZE, EVALUATE & MANAGEMENT SYSTEM</span></h2>
              <p class="animate__animated animate__fadeInUp"></p>
              <!--<a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">login</a>-->
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/cmrit1.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">DRC & Staff Login</h2>
              <p class="animate__animated animate__fadeInUp"></p>
              <a href="drclogin.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">DRC login</a>
              <a href="stafflogin.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Staff login</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/cmrit2.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Student Login</h2>
              <p class="animate__animated animate__fadeInUp"></p>
              <a href="leadlogin.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Leader Login</a>
              <a href="memberlogin.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Member Login</a>
            </div>
          </div>
        </div>
        

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
     
     <!-- <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Green</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/green-free-one-page-bootstrap-template/ -->
        <samp> </samp>
        Developers Team: <br><br>
        <a href="https://www.linkedin.com/in/sreya-reddy-n-5188721a7/" target="_blank">Sreya Reddy N</a> &nbsp; &nbsp; &nbsp; &nbsp;
        <a href="https://www.linkedin.com/in/disha-hati-a718a3199/" target="_blank">Disha Hati </a> &nbsp; &nbsp; &nbsp;
        <a href="https://www.linkedin.com/in/sunrose-shrestha-3406781b6/" target="_blank">Sunrose Shrestha </a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>