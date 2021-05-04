<!DOCTYPE html>
<html>
<head>
	<title>Tix Edu - Add Course</title>

	 <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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

.loginbox{
    width: 500px;
    height: 600px;
    padding: 30px 30px;
}

  </style>
</head>
<body>

	<div class="loginbox">
        <h1>Add new course content</h1>
    <form method="get" action="addCourseContentCode.php">
    <table style = "text-align: left" >
      <col width="150">
      <col style="text-align: right" width="10">
      <col width="200">

    
    <tr>
      <th><label>Course ID <th>:</th></label> </th>
      <th>
        <select name ="course_id" required="">
          <?php
        include('conn1.php');

      $sqlLect2 = 'SELECT course_id, course_name
                        FROM courses_t';
            
            $results2 = mysqli_query($conn1, $sqlLect2);

            for($o = 0; $o<mysqli_num_rows($results2); $o++) {
              $course = mysqli_fetch_array($results2); 
              echo '<option value="'. $course["course_id"] .'">'. $course["course_name"] .'</option>';
            }
          ?>
        </select>
      </th>
    </tr>


     <tr>
      <th><label>Lecturer ID <th>:</th></label> </th>
      <th>
        <select name ="lect_id" required="">
          <?php
        include('conn1.php');

      $sqlLect = 'SELECT lect_id, lect_name
                        FROM lecturer_t';
            
            $results = mysqli_query($conn1, $sqlLect);

            for($o = 0; $o<mysqli_num_rows($results); $o++) {
              $lecturer = mysqli_fetch_array($results); 
              echo '<option value="'. $lecturer["lect_id"] .'">'. $lecturer["lect_name"] .'</option>';
            }
          ?>
        </select>
      </th>
    </tr>


 <tr>
      <th><label>Week Number <th>:</th></label></th> 
      <th><input type = "number" name = "content_week" required ="true" style=" width: 75px" min="1" /> </th>
    </tr>

   <tr>
      <th><label>Content Title <th>:</th></label></th> 
      <th><input type = "text" name = "content_title" required ="true" /> </th>
    </tr>

     <tr>
      <th><label>Content Video Link <th>:</th></label></th> 
      <th><input type = "text" name = "content_media" required ="true" /> </th>
    </tr>



    <br>
  </table>
  <br>
  <br>
  <center>

  <input type="reset" value="Reset"></th>
  <input type="Submit" value="Submit">
  </center>
   </form>



 
</div>


</body>
</html>