<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Account</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style type="text/css">
    .course-navigation{
        height: 1000px;
    }

  </style>

  <!-- =======================================================
  * Template Name: Eterna - v2.1.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
  <div class="container d-flex">
    <div class="contact-info mr-auto">
      <i class="icofont-envelope"></i><a href="mailto:info@tixedu.com">info@tixedu.com</a>
      <i class="icofont-phone"></i><a href="tel:+60133092691">+60 13-309 2691</a>
    </div>
    <div class="social-links">
      <a href="https://twitter.com/tixedu" class="twitter"><i class="icofont-twitter"></i></a>
      <a href="https://www.facebook.com/tixedu/" class="facebook"><i class="icofont-facebook"></i></a>
      <a href="https://www.linkedin.com/company/tix-education-specialists" class="linkedin"><i class="icofont-linkedin"></i></i></a>
    </div>
  </div>
</section>

<?php
    session_start();

    //Step 1 - Establish connection
    //Step 2 - Handling connection error
    include('conn1.php');

    //Step 3 - Execute SQL query
    $sql = 'SELECT *
            FROM COURSES_T';
            
    $results = mysqli_query($conn1, $sql);
    ?>

<!-- ======= Header ======= -->
<header id="header">
  <div class="container d-flex">

    <div class="logo mr-auto">
      <h1 class="text-light"><a href="index.php"><span>TIX EDU</span></a></h1>
    </div>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="drop-down"><a href="courses.php">Courses</a>
          <ul>
            <?php
              //Course Category
              $sqlcategory = 'SELECT DISTINCT course_category
                              FROM COURSES_T';

              $course_parent = mysqli_query($conn1, $sqlcategory);

              for($i = 0; $i<mysqli_num_rows($course_parent); $i++) {
                $category = mysqli_fetch_array($course_parent);
                echo '<li class="drop-down"><a href="#">'. $category['course_category'] .'</a>
                        <ul>';

                $sqlcourses = 'SELECT course_name
                               FROM COURSES_T
                               WHERE course_category = "'. $category['course_category'] .'"';
                                 
                $course_child = mysqli_query($conn1, $sqlcourses);                 

                  for($o = 0; $o<mysqli_num_rows($course_child); $o++) {
                    $courses = mysqli_fetch_array($course_child); 
                    echo '<li><a href="course-page.php?course_name='. $courses['course_name'] .'" onclick="courseWeek(this)">'. $courses['course_name'] .'</a></li>';
                  }
                  echo '</ul>
                      </li>';
                }
            ?>
          </ul>
        </li>  
      
        <li class="drop-down"><a href="">About</a>
          <ul>
            <li><a href="team.php">Team</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </li>

        <li><a href="index.php">Home</a></li>

        <?php
          //Account
          if(isset($_SESSION['login'])) {
            echo "<li><a href='account.php'>". $_SESSION['login'] ."'s Account</a></li>";
          } else {
            echo "<script>
            alert('You are not logged in. Please login first.');
            window.location.href = 'login.html';
          </script>";
          }
        ?>

      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->

  <main id="main">
    <!--Fixed Sidebar-->
      <nav>
        <ul class="course-navigation">
            <div class="icon-box">
              <div class="icon"><i class="icofont-ui-user"></i></div>
              <h4><a>Hello <?php echo $_SESSION['login']; ?></a></h4>
            </div>
          <li><a href="account.php">Account Settings</a></li>
          <?php
            if($_SESSION['logrole'] == 'lecturer_t'){
              echo '<li><a href="#" onclick="editCourses(this)">Edit Course</a></li>';
              echo '<li><a href="#" onclick="courseContent(this)">Edit Course Content</a></li>';
            }
            elseif($_SESSION['logrole'] == 'administrator_t'){
              echo '<li><a href="#" onclick="addCourse(this)">Add Course</a></li>';
              echo '<li><a href="#" onclick="editCourses(this)">Edit Courses</a></li>';
              echo '<li><a href="#" onclick="courseContent(this)">Edit Course Content</a></li>';
              echo '<li><a href="#" onclick="userList(this)">User List</a></li>';
              echo '<li><a href="#" onclick="registerUser(this)">Register User</a></li>';
              echo '<li><a href="#" onclick="viewEnquiry(this)">View Enquiries</a></li>';
            }
          ?>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </nav>

    <!-- ======= Course Content ======= -->
    <section class="course-content">
      <div class="container">
            
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Account</li>
          </ol>
          <h2 id="title">Account Settings</h2>

        </div>
      </section>
      <!-- End Breadcrumbs -->
    <section id="skills" class="skills">
    <div class="skills-content">

      <?php
        if($_SESSION['logrole'] == 'student_t'){
          echo '<iframe src="editStudent.php" width="100%" height="810px" style="border:none;" id="myFrame"></iframe>';
        }
        elseif($_SESSION['logrole'] == 'lecturer_t'){
          echo '<iframe src="editLecturer.php" width="100%" height="810px" style="border:none;" id="myFrame"></iframe>';
        }
        elseif($_SESSION['logrole'] == 'administrator_t'){
          echo '<iframe src="editAdmin.php" width="100%" height="810px" style="border:none;" id="myFrame"></iframe>';
        }
      ?>

      <script>
        function addCourse(i){
          document.getElementById("title").innerHTML = "Add Course";
          document.getElementById("myFrame").src = "addCourse.php";
        }
        
        function editCourses(i){
          document.getElementById("title").innerHTML = "Edit Courses";
          document.getElementById("myFrame").src = "viewCourses.php";
        }

        function courseContent(i){
          document.getElementById("title").innerHTML = "Edit Course Content";
          document.getElementById("myFrame").src = "viewCourseContent.php";
        }

        function userList(i){
          document.getElementById("title").innerHTML = "User Details";
          document.getElementById("myFrame").src = "viewdata.php";
        }

        function registerUser(i){
          document.getElementById("title").innerHTML = "Register User";
          document.getElementById("myFrame").src = "registerAdmin.html";
        }

        function viewEnquiry(i){
          document.getElementById("title").innerHTML = "Enquiries";
          document.getElementById("myFrame").src = "viewEnquiry.php";
        }
      </script>

  </div>
  </section><!-- End Our Skills Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Bukit Jalil, Technology Park Malaysia <br>
              Kuala Lumpur, 56000<br>
              Malaysia <br><br>
              <strong>Phone:</strong> <a href="mailto:info@tixedu.com">+60 013-306 2691</a> <br>
              <strong>Email:</strong> <a href="tel:+60133092691">info@tixedu.com</a> <br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About TIX EDU</h3>
            <p>TIX EDU is a platform were you can learn new skills and knowledge for free. We believe that education should be free and that everyone has a right to it.</p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/tixedu" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/tixedu/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.linkedin.com/company/tix-education-specialists" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>Eterna</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>