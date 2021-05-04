<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Courses</title>
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
        session_start();
          //Account
          if(isset($_SESSION['login'])) {
            echo "<li><a href='account.php'>". $_SESSION['login'] ."'s Account</a></li>";
          }
          else {
            echo "<li><a href='login.html'>Login/Register</a></li>";
          }
        ?>

      </ul>
    </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="courses.php">Courses</a></li>
        </ol>
        <h2><a href="courses.php">Courses</a></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="courses" class="courses">
      <div class="container">

        <div class="row">

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form method="GET">
                  <input type = "text" name = "search_key"/>
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item tags">
                <ul>
                  <?php
                    $course_parent = mysqli_query($conn1, $sqlcategory);

                    for($i = 0; $i<mysqli_num_rows($course_parent); $i++) {
                      $category = mysqli_fetch_array($course_parent);
                      echo '<li><a href="?search_key='. $category['course_category'] .'">'. $category['course_category'] .'</a></li>';
                    }
                  ?>
                </ul>

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

          <div class="col-lg-8 entries">
            
            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
              <div class="container">

                <div class="row">

                  <?php
                    //Courses that match search criteria
                      if (isset($_GET['search_key'])){

                        $sqlsearch = 'SELECT *
                                      FROM COURSES_T
                                      WHERE course_name LIKE "%' . $_GET['search_key'] . '%"
                                      OR course_category LIKE "%'. $_GET['search_key'] .'%"' ;

                        $search = mysqli_query($conn1, $sqlsearch);

                        if(mysqli_num_rows($search) > 0) {
                          for($i = 0; $i<mysqli_num_rows($search); $i++) {
                            $row2 = mysqli_fetch_array($search);
                            $course_name = $row2['course_name'];
                            echo '<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" onclick="coursePage(this)" id="'. $row2['course_name'] .'">
                                    <div class="icon-box">
                                      <div class="icon"><i class="'. $row2['course_icon'] .'"></i></div>
                                      <h4><a href="course-page.php?course_name='.  $row2['course_name'] .'">'. $row2['course_name'] .'</a></h4>
                                      <p>'. $row2['course_description'] .'</p>
                                    </div>
                                  </div>';
                          }
                        }
                        mysqli_free_result($search);    
                      }
                  
                    //Display Available Courses
                      else{
                        for($i = 0; $i<mysqli_num_rows($results); $i++) {
                          $row = mysqli_fetch_array($results);
                          $course_name = $row['course_name'];
                          echo '<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" onclick="coursePage(this)" id="'. $row['course_name'] .'">
                                  <div class="icon-box">
                                    <div class="icon"><i class="'. $row['course_icon'] .'"></i></div>
                                    <h4><a href="course-page.php?course_name='.  $row['course_name'] .'">'. $row['course_name'] .'</a></h4>
                                    <p>'. $row['course_description'] .'</p>
                                  </div>
                                </div>';
                        }
                        /*
                        DaniWeb, 2007. Passing a value via href - php. [Online]
                        Available at: https://www.daniweb.com/programming/web-development/threads/86365/passing-a-value-via-href-php
                        [Accessed 5 October 2020].
                        */
                        mysqli_free_result($results);  
                      }

                    mysqli_close($conn1);
                  ?>
                </div>

                  <!-- JavaScript Code -->
                  <script>
                    function coursePage(i) {
                      window.location = "course-page.php?course_name=" + i.id;
                    }

                    /*
                    w3schools.com, n.a. HTML onclick Event Attribute. [Online]
                    Available at: https://www.w3schools.com/tags/ev_onclick.asp
                    [Accessed 5 October 2020].

                    StackOverflow, 2010. How to get the onclick calling object?. [Online]
                    Available at: https://stackoverflow.com/questions/1553661/how-to-get-the-onclick-calling-object
                    [Accessed 6 October 2020].
                    */
                  </script>
              </div>
            </section><!-- End Services Section -->
          </div>
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