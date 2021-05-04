<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <?php
    include('conn1.php');

    //Course Details
    $sql = 'SELECT *
            FROM COURSES_T
            WHERE course_name = "'. $_GET['course_name'] .'"';
            
    $results = mysqli_query($conn1, $sql);
    $row = mysqli_fetch_array($results);

    echo "<title>". $_GET['course_name'] ." Course</title>";
  ?>

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

                $sqlcourses = 'SELECT *
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
      
        <li class="drop-down"><a href="#">About</a>
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
                      
            if($_SESSION['logrole'] != 'student_t'){
              echo "<script>
                      alert('You are not logged in as a Student.');
                      window.location.href = 'courses.php';
                    </script>";
            }
          }
          else {
            echo "<script>
                    alert('You are not logged in.');
                    window.location.href = 'login.html';
                  </script>";
          }
        ?>
        
      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->

  <main id="main">

    <?php
    //Enroll Student if not already
    $sqlStudentCourse = 'SELECT *
                         FROM STUDENT_COURSE_T
                         WHERE stu_id = "'. $_SESSION['id'] .'" AND course_id = "'. $row['course_id'] .'"';
    
    $enroll = mysqli_query($conn1, $sqlStudentCourse);

    $student_week = 0;
    $student_progress = 0;
    if (mysqli_num_rows($enroll)==0){
      $sqlEnroll = "INSERT INTO STUDENT_COURSE_T (`stu_id`, `course_id`, `sc_week`, `sc_progress`)
                    VALUES (". $_SESSION['id'] .", ". $row['course_id'] .", 0, 0)";

      mysqli_query($conn1, $sqlEnroll);
      $student_week = 0;
    } else {
      $student_course = mysqli_fetch_assoc($enroll);
      $student_week = $student_course['sc_week'];
      $student_progress = $student_course['sc_progress'];
    }
    ?>

    <!--Fixed Sidebar-->
      <nav>
        <ul class="course-navigation">
          <?php
            echo '<div class="icon-box">
                    <div class="icon"><i class="'. $row['course_icon'] .'"></i></div>
                    <h4><a>'. $row['course_name'] .'</a></h4>
                  </div>';
            
            //Course Content
            $sqlcontent = 'SELECT *
                           FROM COURSE_CONTENT_T
                           WHERE course_id = '. $row['course_id'] .'
                           ORDER BY content_week';

            $content = mysqli_query($conn1, $sqlcontent);
            $content_media = array();
            for($u = 1; $u<=mysqli_num_rows($content); $u++) {
              $row2 = mysqli_fetch_array($content);
              array_push($content_media, $row2['content_media']);
            }

              echo '<li><a href="#0" onclick="courseWeek(this)" id="'. $content_media[0] .'">Overview</a></li>';
            for($i = 1; $i<mysqli_num_rows($content); $i++) {
              echo '<li><a href="#'. $i .'" onclick="courseWeek(this)" id="'. $content_media[$i] .'">Week '. $i .'</a></li>';
            }

            $total_weeks = mysqli_num_rows($content);
            if ($student_week == $total_weeks){
              $student_week = $total_weeks - 1;
            }
          ?>
        </ul>
      </nav>

    <!-- ======= Course Content ======= -->
    <section class="course-content">
      <div class="container">
            
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <ol>
            <li><a href="courses.php">Courses</a></li>
            <li><?php echo $_GET['course_name']; ?></li>
          </ol>
          <?php echo '<h2 id="title">Week '. $student_week .'</h2>' ?>

        </div>
      </section>
      <!-- End Breadcrumbs -->
    <section id="skills" class="skills">
    <div class="skills-content">

      <style>
        #weekProgress{
          width: 100%;
          height: 100%;
          display: none;
        }
      </style>

      <?php
        $studentWeek = $student_week;
        echo '<div class="progress">
                <h4>Course Progress</h4>
                <span class="skill">'. $_GET['course_name'] .'<i class="val">'. $student_progress .'%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="'. $student_progress .'" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <form method="POST" action="updateProgress.php">
                  <input type = "hidden" name = "courseId" id="weekProgress" value="'. $row['course_id'] .'"/>
                  <input type = "hidden" name = "courseName" id="weekProgress" value="'. $_GET['course_name'] .'"/>  
                  <input type = "hidden" name = "totalWeeks" id="weekProgress" value="'. $total_weeks .'"/>
                  <input type = "hidden" name = "studentWeek" id="studentWeek" value="'. $studentWeek .'"/>
                  <button id="btn" onClick="btnNext(this)" type="submit" disabled>Next ></button>
                </form>
              </div>';
      ?>

      <div class="section-title">
        <div id="player"></div>
        <script src="http://www.youtube.com/player_api"></script>

      <!-- JavaScript Code -->
      <script>
        var content_media;
        
        function courseWeek(i) {        
          var week = String(i).slice(-1);
          document.getElementById("title").innerHTML = 'Week '+ week;
          document.getElementById("studentWeek").value = week;
          content_media = i.getAttribute("id");
          player.loadVideoById(content_media);
        }

        // create youtube player
        
        var player;
        function onYouTubePlayerAPIReady() {
            player = new YT.Player('player', {
              height: '390',
              width: '640',
              videoId: '<?php echo $content_media[$student_week]; ?>',
              events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
              }
            });
        }

        // autoplay video
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        // when video ends
        function onPlayerStateChange(event) {        
            if(event.data === 0) {            
              document.getElementById("btn").disabled = false;
            }
        }
        
        player.loadVideoById(content_media);

        //Button OnClick
        function btnNext(i){
          var nextWeek = parseInt(document.getElementById("title").innerHTML.substring(5, 7)) + 1;
          var totalWeek = <?php echo mysqli_num_rows($content); ?>;
          if (nextWeek<totalWeek){
            
          } else {
            alert("Congratulations! You have successfully completed the course! Do check out the other courses available on TIX EDU!");
          }
        }
        </script>
        </div>

      </div>
    </section>

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


<!--         
    Beamtic, 2020. Change Iframe src with JavaScript. [Online]
    Available at: https://beamtic.com/change-iframe-src-javascript
    [Accessed 5 October 2020].

    DaniWeb, 2007. Passing a value via href - php. [Online]
    Available at: https://www.daniweb.com/programming/web-development/threads/86365/passing-a-value-via-href-php
    [Accessed 5 October 2020].

    Ming, S. 2019. 5 Ways to Convert a Value to String in JavaScript. [Online]
    Available at: https://medium.com/dailyjs/5-ways-to-convert-a-value-to-string-in-javascript-6b334b2fc778
    [Accessed 6 October 2020].

    MDN Web Docs, 2020. String.prototype.slice(). [Online]
    Available at: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/slice
    [Accessed 6 October 2020].
    
    W3Docs, n.a. How to Add Elements to an Empty Array in PHP. [Online]
    Available at: https://www.w3docs.com/snippets/php/how-to-add-elements-to-an-empty-array-in-php.html
    [Accessed 5 October 2020].

    w3schools.com, n.a. HTML DOM getAttribute() Method. [Online]
    Available at: https://www.w3schools.com/jsref/met_element_getattribute.asp
    [Accessed 6 October 2020].

    w3schools.com, n.a. HTML DOM getElementById() Method. [Online]
    Available at: https://www.w3schools.com/jsref/met_document_getelementbyid.asp
    [Accessed 5 October 2020].

    w3schools.com, n.a. HTML onclick Event Attribute. [Online]
    Available at: https://www.w3schools.com/tags/ev_onclick.asp
    [Accessed 5 October 2020].

    w3schools.com, n.a. JavaScript Output. [Online]
    Available at: https://www.w3schools.com/js/js_output.asp
    [Accessed 5 October 2020].

    StackOverflow, 2012. How do I disable and re-enable a button in with javascript?. [Online]
    Available at: https://stackoverflow.com/questions/8394562/how-do-i-disable-and-re-enable-a-button-in-with-javascript
    [Accessed 16 October 2020].
    
    StackOverflow, 2011. How to detect when a youtube video finishes playing?. [Online]
    Available at: https://stackoverflow.com/questions/7853904/how-to-detect-when-a-youtube-video-finishes-playing
    [Accessed 9 October 2020].
    
    StackOverflow, 2013. How to Dynamically change Youtube Player videoID. [Online]
    Available at: https://stackoverflow.com/questions/13180540/how-to-dynamically-change-youtube-player-videoid
    [Accessed 10 October 2020].
    
    StackOverflow, 2010. How to get the onclick calling object?. [Online]
    Available at: https://stackoverflow.com/questions/1553661/how-to-get-the-onclick-calling-object
    [Accessed 6 October 2020].

    StackOverflow, 2011. Set the value of an input field. [Online]
    Available at: https://stackoverflow.com/questions/7609130/set-the-value-of-an-input-field
    [Accessed 18 October 2020]. 
-->
